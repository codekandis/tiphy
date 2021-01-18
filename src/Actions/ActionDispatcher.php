<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatcherInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatchmentState;
use CodeKandis\Tiphy\Http\Requests\JsonBody;
use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Throwables\Handlers\ThrowableHandlerInterface;
use Throwable;
use function is_string;
use function preg_match;
use function strpos;
use function substr;
use function urldecode;

/**
 * Represents an action dispatcher.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ActionDispatcher implements ActionDispatcherInterface
{
	/**
	 * Stores the routes configuration.
	 * @var RoutesConfigurationInterface
	 */
	private RoutesConfigurationInterface $routesConfiguration;

	/**
	 * Stores the pre-dispatcher of the dispatcher;
	 * @var ?PreDispatcherInterface
	 */
	private ?PreDispatcherInterface $preDispatcher;

	/**
	 * Stores the throwable handler of the dispatcher.
	 * @var ?ThrowableHandlerInterface
	 */
	private ?ThrowableHandlerInterface $throwableHandler;

	/**
	 * Stores the requested route.
	 * @var string
	 */
	private string $requestedRoute;

	/**
	 * Stores the requested HTTP method.
	 * @var string
	 */
	private string $requestedMethod;

	/**
	 * Constructor method.
	 * @param RoutesConfigurationInterface $routesConfiguration The routes configuration of the action dispatcher.
	 * @param ?PreDispatcherInterface $preDispatcher The pre-dispatcher of the action dispatcher.
	 * @param ?ThrowableHandlerInterface $throwableHandler The throwable handler of the action dispatcher.
	 */
	public function __construct( RoutesConfigurationInterface $routesConfiguration, ?PreDispatcherInterface $preDispatcher = null, ?ThrowableHandlerInterface $throwableHandler = null )
	{
		$this->routesConfiguration = $routesConfiguration;
		$this->preDispatcher       = $preDispatcher;
		$this->throwableHandler    = $throwableHandler;
		$this->requestedRoute      = $this->getParsedRequestRoute();
		$this->requestedMethod     = $_SERVER[ 'REQUEST_METHOD' ];
	}

	/**
	 * Gets the parsed request route.
	 * @return string The parsed request route.
	 */
	private function getParsedRequestRoute(): string
	{
		$requestUri                      = $_SERVER[ 'REQUEST_URI' ];
		$queryArgumentsDelimiterPosition = strpos( $requestUri, '?' );

		return false === $queryArgumentsDelimiterPosition
			? $requestUri
			: substr( $requestUri, 0, $queryArgumentsDelimiterPosition );
	}

	/**
	 * Filters the arguments from the requested URI.
	 * @param array $matches The argument matches of the requested URI.
	 * @return array The filtered arguments.
	 */
	private function filterArguments( array $matches ): array
	{
		$filteredArguments = [];
		foreach ( $matches as $matchIndex => $matchValue )
		{
			$isString = is_string( $matchIndex );
			if ( true === $isString )
			{
				$filteredArguments[ $matchIndex ] = urldecode( $matchValue );
			}
		}

		return $filteredArguments;
	}

	/**
	 * @inheritDoc
	 */
	public function dispatch(): void
	{
		try
		{
			if ( null !== $this->preDispatcher )
			{
				$preDispatchmentState = new PreDispatchmentState();
				$this->preDispatcher->preDispatch( $preDispatchmentState );
				if ( true === $preDispatchmentState->getPreventDispatchment() )
				{
					return;
				}
			}

			$actionClass     = null;
			$requestBody     = '';
			$actionArguments = [];
			foreach ( $this->routesConfiguration->getRoutes() as $configuredRoute => $configuredMethods )
			{
				$matches    = [];
				$isMatching = preg_match( '~' . $configuredRoute . '~', $this->requestedRoute, $matches );
				if ( 1 === $isMatching )
				{
					$actionClass = MethodNotAllowedAction::class;
					foreach ( $configuredMethods as $configuredMethod => $configuredAction )
					{
						if ( $configuredMethod === $this->requestedMethod )
						{
							$actionClass     = $configuredAction;
							$requestBody     = new JsonBody();
							$actionArguments = $this->filterArguments( $matches );
							break;
						}
					}
					break;
				}
			}

			/** @var ActionInterface $action */
			if ( null === $actionClass )
			{
				$action = new NotFoundAction();
			}
			else
			{
				$action = new $actionClass( $requestBody, $actionArguments );
			}
			$action->execute();
		}
		catch ( Throwable $throwable )
		{
			if ( null === $this->throwableHandler )
			{
				throw $throwable;
			}
			$this->throwableHandler->execute( $throwable );
		}
	}
}

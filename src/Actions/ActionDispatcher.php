<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

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
	private $routesConfiguration;

	/**
	 * Stores the throwable handler of the dispatcher.
	 * @var null|ThrowableHandlerInterface
	 */
	private $throwableHandler;

	/**
	 * Stores the requested route.
	 * @var string
	 */
	private $requestedRoute;

	/**
	 * Stores the requested HTTP method.
	 * @var string
	 */
	private $requestedMethod;

	/**
	 * Constructor method.
	 * @param RoutesConfigurationInterface $routesConfiguration The routes configuration of the action dispatcher.
	 * @param null|ThrowableHandlerInterface $throwableHandler The throwable handler of the action dispatcher.
	 */
	public function __construct( RoutesConfigurationInterface $routesConfiguration, ?ThrowableHandlerInterface $throwableHandler = null )
	{
		$this->routesConfiguration = $routesConfiguration;
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
	 * {@inheritdoc}
	 */
	public function dispatch(): void
	{
		try
		{
			/** @var ActionInterface $action */
			$actionClass     = NotFoundAction::class;
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

			$action = new $actionClass( $requestBody, $actionArguments );
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

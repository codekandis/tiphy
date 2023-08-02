<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatcherInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatchmentState;
use CodeKandis\Tiphy\Configurations\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Entities\NotFoundEntity;
use CodeKandis\Tiphy\Entities\NotFoundEntityInterface;
use CodeKandis\Tiphy\Http\Requests\JsonBody;
use CodeKandis\Tiphy\Throwables\Handlers\ThrowableHandlerInterface;
use Throwable;
use function is_string;
use function sprintf;
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
	 * Stores the requested HTTP method.
	 * @var string
	 */
	private string $requestedMethod;

	/**
	 * Stores the requested URI.
	 * @var string
	 */
	private string $requestedUri;

	/**
	 * Stores the requested route.
	 * @var string
	 */
	private string $requestedRoute;

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
		$this->requestedMethod     = $_SERVER[ 'REQUEST_METHOD' ];
		$this->requestedUri        = $_SERVER[ 'REQUEST_URI' ];
		$this->requestedRoute      = $this->getParsedRequestRoute();
	}

	/**
	 * Gets the parsed request route.
	 * @return string The parsed request route.
	 */
	private function getParsedRequestRoute(): string
	{
		$queryArgumentsDelimiterPosition = strpos( $this->requestedUri, '?' );

		return false === $queryArgumentsDelimiterPosition
			? $this->requestedUri
			: substr( $this->requestedUri, 0, $queryArgumentsDelimiterPosition );
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
	 * {@inheritDoc}
	 */
	public function dispatch(): void
	{
		try
		{
			if ( null !== $this->preDispatcher )
			{
				$preDispatchmentState = new PreDispatchmentState();
				$this->preDispatcher->preDispatch( $this->requestedUri, $preDispatchmentState );
				if ( true === $preDispatchmentState->getPreventDispatchment() )
				{
					return;
				}
			}

			$routesPresets = $this->routesConfiguration->getPresets();

			$actionClass     = null;
			$requestBody     = '';
			$actionArguments = [];

			foreach ( $routesPresets as $routesPreset )
			{
				$baseRoute = $routesPreset->getBaseRoute();

				$routeFound = false;
				foreach ( $routesPreset->getRoutes() as $configuredRoute => $configuredMethods )
				{
					$matches = ( new RegularExpression(
						sprintf(
							'~^%s%s$~',
							$baseRoute,
							$configuredRoute
						)
					) )
						->match( $this->requestedRoute, false );
					if ( null !== $matches )
					{
						$routeFound = true;

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

				if ( true === $routeFound )
				{
					break;
				}
			}

			/**
			 * @var ActionInterface $action
			 */
			if ( null === $actionClass )
			{
				/**
				 * @var NotFoundEntityInterface $notFoundEntity
				 */
				$notFoundEntity = NotFoundEntity::fromArray(
					[
						'method' => $this->requestedMethod,
						'uri'    => $this->requestedRoute
					]
				);

				$action = new NotFoundAction( $notFoundEntity );
			}
			else
			{
				$action = new $actionClass( $this->requestedRoute, $requestBody, $actionArguments );
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

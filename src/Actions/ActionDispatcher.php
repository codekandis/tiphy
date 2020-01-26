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

class ActionDispatcher implements ActionDispatcherInterface
{
	/** @var RoutesConfigurationInterface */
	private $routesConfiguration;

	/** @var ?ThrowableHandlerInterface */
	private $throwableHandler;

	/** @var string */
	private $requestedRoute;

	/** @var string */
	private $requestedMethod;

	public function __construct( RoutesConfigurationInterface $routesConfiguration, ?ThrowableHandlerInterface $throwableHandler = null )
	{
		$this->routesConfiguration = $routesConfiguration;
		$this->throwableHandler    = $throwableHandler;
		$this->requestedRoute      = $this->getParsedRequestRoute();
		$this->requestedMethod     = $_SERVER[ 'REQUEST_METHOD' ];
	}

	private function getParsedRequestRoute(): string
	{
		$requestUri                      = $_SERVER[ 'REQUEST_URI' ];
		$queryArgumentsDelimiterPosition = strpos( $requestUri, '?' );

		return false === $queryArgumentsDelimiterPosition
			? $requestUri
			: substr( $requestUri, 0, $queryArgumentsDelimiterPosition );
	}

	/**
	 * @throws Throwable
	 */
	public function dispatch(): void
	{
		try
		{
			/** @var ActionInterface $action */
			$actionClass      = NotFoundAction::class;
			$requestBody      = '';
			$actionArguments  = [];
			$configuredRoutes = $this->routesConfiguration->getRoutes();
			foreach ( $configuredRoutes as $configuredRoute => $configuredMethods )
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
}

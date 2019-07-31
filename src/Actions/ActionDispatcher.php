<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Requests\JsonBody;
use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use function is_string;
use function preg_match;
use function urldecode;

class ActionDispatcher implements ActionDispatcherInterface
{
	/** @var RoutesConfigurationInterface */
	private $config;

	/** @var string */
	private $requestedRoute;

	/** @var string */
	private $requestedMethod;

	public function __construct( RoutesConfigurationInterface $config )
	{
		$this->config          = $config;
		$this->requestedRoute  = $_SERVER[ 'REQUEST_URI' ];
		$this->requestedMethod = $_SERVER[ 'REQUEST_METHOD' ];
	}

	public function dispatch(): void
	{
		/** @var ActionInterface $action */
		$actionClass      = NotFoundAction::class;
		$requestBody      = '';
		$actionArguments  = [];
		$configuredRoutes = $this->config->getRoutes( $_SERVER[ 'HTTP_HOST' ] );
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

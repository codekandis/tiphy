<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

use function array_keys;
use function dirname;

class RoutesConfiguration implements RoutesConfigurationInterface
{
	/** @var array */
	private $data;

	public function __construct()
	{
		$this->data = require dirname( __DIR__, 2 ) . '/config/routes.php';
	}

	public function getHosts(): array
	{
		return array_keys( $this->data );
	}

	public function getRoutes( string $host ): array
	{
		return $this->data[ $host ];
	}
}

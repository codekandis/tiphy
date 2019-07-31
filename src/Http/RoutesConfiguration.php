<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;
use function array_keys;

class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	public function __construct( string $path )
	{
		parent::__construct( $path );
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

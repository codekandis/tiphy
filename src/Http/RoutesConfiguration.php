<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	public function __construct( string $path )
	{
		parent::__construct( $path );
	}

	public function getRoutes(): array
	{
		return $this->data;
	}
}

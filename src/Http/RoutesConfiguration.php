<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	public function getRoutes(): array
	{
		return $this->data;
	}
}

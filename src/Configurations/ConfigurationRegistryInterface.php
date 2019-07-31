<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;

interface ConfigurationRegistryInterface
{
	public function setRoutesConfigurationPath( string $path ): void;

	public function getRoutesConfiguration(): RoutesConfigurationInterface;

	public function setPersistenceConfigurationPath( string $path ): void;

	public function getPersistenceConfiguration(): PersistenceConfigurationInterface;

	public function setUriBuilderConfigurationPath( string $path ): void;

	public function getUriBuilderConfiguration(): UriBuilderConfigurationInterface;
}

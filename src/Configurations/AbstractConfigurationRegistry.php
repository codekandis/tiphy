<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Tiphy\Http\RoutesConfiguration;
use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfiguration;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfiguration;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;

abstract class AbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	/** @var ConfigurationRegistryInterface */
	protected static $instance;

	/** @var string */
	private $routesConfigurationPath = '';

	/** @var RoutesConfigurationInterface */
	private $routesConfiguration;

	/** @var string */
	private $persistenceConfigurationPath = '';

	/** @var PersistenceConfigurationInterface */
	private $persistenceConfiguration;

	/** @var string */
	private $uriBuilderConfigurationPath = '';

	/** @var UriBuilderConfigurationInterface */
	private $uriBuilderConfiguration;

	private function __construct()
	{
		$this->initialize();
	}

	private function __clone()
	{
	}

	public static function _(): ConfigurationRegistryInterface
	{
		return static::$instance
		       ?? static::$instance = new static();
	}

	public function setRoutesConfigurationPath( string $path ): void
	{
		$this->routesConfigurationPath = $path;
	}

	public function getRoutesConfiguration(): RoutesConfigurationInterface
	{
		return $this->routesConfiguration
		       ?? $this->routesConfiguration = new RoutesConfiguration( $this->routesConfigurationPath );
	}

	public function setPersistenceConfigurationPath( string $path ): void
	{
		$this->persistenceConfigurationPath = $path;
	}

	public function getPersistenceConfiguration(): PersistenceConfigurationInterface
	{
		return $this->persistenceConfiguration
		       ?? $this->persistenceConfiguration = new PersistenceConfiguration( $this->persistenceConfigurationPath );
	}

	public function setUriBuilderConfigurationPath( string $path ): void
	{
		$this->uriBuilderConfigurationPath = $path;
	}

	public function getUriBuilderConfiguration(): UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration
		       ?? $this->uriBuilderConfiguration = new UriBuilderConfiguration( $this->uriBuilderConfigurationPath );
	}

	abstract protected function initialize(): void;
}

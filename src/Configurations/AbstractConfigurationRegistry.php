<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Tiphy\Http\RoutesConfiguration;
use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfiguration;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfiguration;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfiguration;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfigurationInterface;

/**
 * Represents the base class of all configuration registries.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	/**
	 * Stores the singleton instance of the configuration registry.
	 * @var ConfigurationRegistryInterface
	 */
	protected static ConfigurationRegistryInterface $instance;

	/**
	 * Stores the path of the routes configuration.
	 * @var string
	 */
	private string $routesConfigurationPath = '';

	/**
	 * Stores the routes configuration.
	 * @var RoutesConfigurationInterface
	 */
	private RoutesConfigurationInterface $routesConfiguration;

	/**
	 * Stores the path of the persistence configuration.
	 * @var string
	 */
	private string $persistenceConfigurationPath = '';

	/**
	 * Stores the persistence configuration.
	 * @var PersistenceConfigurationInterface
	 */
	private PersistenceConfigurationInterface $persistenceConfiguration;

	/**
	 * Stores the path of the template renderer configuration.
	 * @var string
	 */
	private string $templateRendererConfigurationPath = '';

	/**
	 * Stores the template renderer configuration.
	 * @var TemplateRendererConfigurationInterface
	 */
	private TemplateRendererConfigurationInterface $templateRendererConfiguration;

	/**
	 * Stores the path of the URI builder configuration.
	 * @var string
	 */
	private string $uriBuilderConfigurationPath = '';

	/**
	 * Stores the URI builder configuration.
	 * @var UriBuilderConfigurationInterface
	 */
	private UriBuilderConfigurationInterface $uriBuilderConfiguration;

	/**
	 * Constructor method.
	 */
	private function __construct()
	{
		$this->initialize();
	}

	/**
	 * Clones the configuration registry.
	 */
	private function __clone()
	{
	}

	/**
	 * Creates the singleton instance of the configuration registry.
	 * @return ConfigurationRegistryInterface
	 */
	public static function _(): ConfigurationRegistryInterface
	{
		return static::$instance
			   ?? static::$instance = new static();
	}

	/**
	 * @inheritDoc
	 */
	public function getRoutesConfiguration(): RoutesConfigurationInterface
	{
		return $this->routesConfiguration
			   ?? $this->routesConfiguration = new RoutesConfiguration( $this->routesConfigurationPath );
	}

	/**
	 * @inheritDoc
	 */
	public function setRoutesConfigurationPath( string $path ): void
	{
		$this->routesConfigurationPath = $path;
	}

	/**
	 * @inheritDoc
	 */
	public function getPersistenceConfiguration(): PersistenceConfigurationInterface
	{
		return $this->persistenceConfiguration
			   ?? $this->persistenceConfiguration = new PersistenceConfiguration( $this->persistenceConfigurationPath );
	}

	/**
	 * @inheritDoc
	 */
	public function setPersistenceConfigurationPath( string $path ): void
	{
		$this->persistenceConfigurationPath = $path;
	}

	/**
	 * @inheritDoc
	 */
	public function getTemplateRendererConfiguration(): TemplateRendererConfigurationInterface
	{
		return $this->templateRendererConfiguration
			   ?? $this->templateRendererConfiguration = new TemplateRendererConfiguration( $this->templateRendererConfigurationPath );
	}

	/**
	 * @inheritDoc
	 */
	public function setTemplateRendererConfigurationPath( string $path ): void
	{
		$this->templateRendererConfigurationPath = $path;
	}

	/**
	 * @inheritDoc
	 */
	public function getUriBuilderConfiguration(): UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration
			   ?? $this->uriBuilderConfiguration = new UriBuilderConfiguration( $this->uriBuilderConfigurationPath );
	}

	/**
	 * @inheritDoc
	 */
	public function setUriBuilderConfigurationPath( string $path ): void
	{
		$this->uriBuilderConfigurationPath = $path;
	}

	/**
	 * Initializes the configuration registry.
	 */
	abstract protected function initialize(): void;
}

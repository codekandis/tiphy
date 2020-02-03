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
	protected static $instance;

	/**
	 * Stores the path of the routes configuration.
	 * @var string
	 */
	private $routesConfigurationPath = '';

	/**
	 * Stores the routes configuration.
	 * @var RoutesConfigurationInterface
	 */
	private $routesConfiguration;

	/**
	 * Stores the path of the persistence configuration.
	 * @var string
	 */
	private $persistenceConfigurationPath = '';

	/**
	 * Stores the persistence configuration.
	 * @var PersistenceConfigurationInterface
	 */
	private $persistenceConfiguration;

	/**
	 * Stores the path of the template renderer configuration.
	 * @var string
	 */
	private $templateRendererConfigurationPath = '';

	/**
	 * Stores the template renderer configuration.
	 * @var TemplateRendererConfigurationInterface
	 */
	private $templateRendererConfiguration;

	/**
	 * Stores the path of the URI builder configuration.
	 * @var string
	 */
	private $uriBuilderConfigurationPath = '';

	/**
	 * Stores the URI builder configuration.
	 * @var UriBuilderConfigurationInterface
	 */
	private $uriBuilderConfiguration;

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
	 * {@inheritdoc}
	 */
	public function getRoutesConfiguration(): RoutesConfigurationInterface
	{
		return $this->routesConfiguration
		       ?? $this->routesConfiguration = new RoutesConfiguration( $this->routesConfigurationPath );
	}

	/**
	 * {@inheritdoc}
	 */
	public function setRoutesConfigurationPath( string $path ): void
	{
		$this->routesConfigurationPath = $path;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getPersistenceConfiguration(): PersistenceConfigurationInterface
	{
		return $this->persistenceConfiguration
		       ?? $this->persistenceConfiguration = new PersistenceConfiguration( $this->persistenceConfigurationPath );
	}

	/**
	 * {@inheritdoc}
	 */
	public function setPersistenceConfigurationPath( string $path ): void
	{
		$this->persistenceConfigurationPath = $path;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getTemplateRendererConfiguration(): TemplateRendererConfigurationInterface
	{
		return $this->templateRendererConfiguration
		       ?? $this->templateRendererConfiguration = new TemplateRendererConfiguration( $this->templateRendererConfigurationPath );
	}

	/**
	 * {@inheritdoc}
	 */
	public function setTemplateRendererConfigurationPath( string $path ): void
	{
		$this->templateRendererConfigurationPath = $path;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getUriBuilderConfiguration(): UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration
		       ?? $this->uriBuilderConfiguration = new UriBuilderConfiguration( $this->uriBuilderConfigurationPath );
	}

	/**
	 * {@inheritdoc}
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

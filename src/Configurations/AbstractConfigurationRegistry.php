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
	 * Stores the routes configuration.
	 * @var ?RoutesConfigurationInterface
	 */
	private ?RoutesConfigurationInterface $routesConfiguration = null;

	/**
	 * Stores the persistence configuration.
	 * @var ?PersistenceConfigurationInterface
	 */
	private ?PersistenceConfigurationInterface $persistenceConfiguration = null;

	/**
	 * Stores the template renderer configuration.
	 * @var ?TemplateRendererConfigurationInterface
	 */
	private ?TemplateRendererConfigurationInterface $templateRendererConfiguration = null;

	/**
	 * Stores the URI builder configuration.
	 * @var ?UriBuilderConfigurationInterface
	 */
	private ?UriBuilderConfigurationInterface $uriBuilderConfiguration = null;

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
	public function getRoutesConfiguration(): ?RoutesConfigurationInterface
	{
		return $this->routesConfiguration;
	}

	/**
	 * @inheritDoc
	 */
	public function setPlainRoutesConfiguration( array $plainRoutesConfiguration ): void
	{
		$this->routesConfiguration = new RoutesConfiguration( $plainRoutesConfiguration );
	}

	/**
	 * @inheritDoc
	 */
	public function getPersistenceConfiguration(): ?PersistenceConfigurationInterface
	{
		return $this->persistenceConfiguration;
	}

	/**
	 * @inheritDoc
	 */
	public function setPlainPersistenceConfiguration( array $plainPersistenceConfiguration ): void
	{
		$this->persistenceConfiguration = new PersistenceConfiguration( $plainPersistenceConfiguration );
	}

	/**
	 * @inheritDoc
	 */
	public function getTemplateRendererConfiguration(): ?TemplateRendererConfigurationInterface
	{
		return $this->templateRendererConfiguration;
	}

	/**
	 * @inheritDoc
	 */
	public function setPlainTemplateRendererConfiguration( array $plainTemplateRendererConfiguration ): void
	{
		$this->templateRendererConfiguration = new TemplateRendererConfiguration( $plainTemplateRendererConfiguration );
	}

	/**
	 * @inheritDoc
	 */
	public function getUriBuilderConfiguration(): ?UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration;
	}

	/**
	 * @inheritDoc
	 */
	public function setPlainUriBuilderConfiguration( array $plainUriBuilderConfiguration ): void
	{
		$this->uriBuilderConfiguration = new UriBuilderConfiguration( $plainUriBuilderConfiguration );
	}

	/**
	 * Initializes the configuration registry.
	 */
	abstract protected function initialize(): void;
}

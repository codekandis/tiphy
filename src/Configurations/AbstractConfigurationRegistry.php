<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

/**
 * Represents the base class of any configuration registry
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
	 * {@inheritDoc}
	 */
	public function getRoutesConfiguration(): ?RoutesConfigurationInterface
	{
		return $this->routesConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setPlainRoutesConfiguration( array $plainRoutesConfiguration ): void
	{
		$this->routesConfiguration = new RoutesConfiguration( $plainRoutesConfiguration );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateRendererConfiguration(): ?TemplateRendererConfigurationInterface
	{
		return $this->templateRendererConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setPlainTemplateRendererConfiguration( array $plainTemplateRendererConfiguration ): void
	{
		$this->templateRendererConfiguration = new TemplateRendererConfiguration( $plainTemplateRendererConfiguration );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUriBuilderConfiguration(): ?UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration;
	}

	/**
	 * {@inheritDoc}
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

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\AbstractConfigurationRegistry as OriginAbstractConfigurationRegistry;

/**
 * Represents the base class of any configuration registry
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfigurationRegistry extends OriginAbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	/**
	 * Stores the routes configuration.
	 * @var ?RoutesConfigurationInterface
	 */
	protected ?RoutesConfigurationInterface $routesConfiguration = null;

	/**
	 * Stores the template renderer configuration.
	 * @var ?TemplateRendererConfigurationInterface
	 */
	protected ?TemplateRendererConfigurationInterface $templateRendererConfiguration = null;

	/**
	 * Stores the URI builder configuration.
	 * @var ?UriBuilderConfigurationInterface
	 */
	protected ?UriBuilderConfigurationInterface $uriBuilderConfiguration = null;

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
	public function getTemplateRendererConfiguration(): ?TemplateRendererConfigurationInterface
	{
		return $this->templateRendererConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUriBuilderConfiguration(): ?UriBuilderConfigurationInterface
	{
		return $this->uriBuilderConfiguration;
	}
}

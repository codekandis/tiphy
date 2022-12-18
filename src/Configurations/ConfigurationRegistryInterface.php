<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\ConfigurationRegistryInterface as OriginConfigurationRegistryInterface;

/**
 * Represents the interface of any configuration registry.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConfigurationRegistryInterface extends OriginConfigurationRegistryInterface
{
	/**
	 * Gets the routes configuration.
	 * @return ?RoutesConfigurationInterface The routes configuration.
	 */
	public function getRoutesConfiguration(): ?RoutesConfigurationInterface;

	/**
	 * Gets the template renderer configuration.
	 * @return ?TemplateRendererConfigurationInterface The template renderer configuration.
	 */
	public function getTemplateRendererConfiguration(): ?TemplateRendererConfigurationInterface;

	/**
	 * Gets the URI builder configuration.
	 * @return ?UriBuilderConfigurationInterface The URI builder configuration.
	 */
	public function getUriBuilderConfiguration(): ?UriBuilderConfigurationInterface;
}

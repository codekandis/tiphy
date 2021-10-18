<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfigurationInterface;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfigurationInterface;

/**
 * Represents the interface of all configuration registries.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConfigurationRegistryInterface
{
	/**
	 * Gets the routes configuration.
	 * @return ?RoutesConfigurationInterface The routes configuration.
	 */
	public function getRoutesConfiguration(): ?RoutesConfigurationInterface;

	/**
	 * Sets the plain routes configuration.
	 * @param array $plainRoutesConfiguration The plain routes configuration.
	 */
	public function setPlainRoutesConfiguration( array $plainRoutesConfiguration ): void;

	/**
	 * Gets the template renderer configuration.
	 * @return ?TemplateRendererConfigurationInterface The template renderer configuration.
	 */
	public function getTemplateRendererConfiguration(): ?TemplateRendererConfigurationInterface;

	/**
	 * Sets the plain template renderer configuration.
	 * @param array $plainTemplateRendererConfiguration The plain template renderer configuration.
	 */
	public function setPlainTemplateRendererConfiguration( array $plainTemplateRendererConfiguration ): void;

	/**
	 * Gets the path of the URI builder configuration.
	 * @return ?UriBuilderConfigurationInterface The URI builder configuration.
	 */
	public function getUriBuilderConfiguration(): ?UriBuilderConfigurationInterface;

	/**
	 * Sets the plain URI builder configuration.
	 * @param array $plainUriBuilderConfiguration The plain URI builder configuration.
	 */
	public function setPlainUriBuilderConfiguration( array $plainUriBuilderConfiguration ): void;
}

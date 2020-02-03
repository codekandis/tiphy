<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Tiphy\Http\RoutesConfigurationInterface;
use CodeKandis\Tiphy\Http\UriBuilders\UriBuilderConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfigurationInterface;

/**
 * Represents the interface of all configuration registries.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConfigurationRegistryInterface
{
	/**
	 * Gets the path of the routes configuration.
	 * @return string The path of the routes configuration.
	 */
	public function getRoutesConfiguration(): RoutesConfigurationInterface;

	/**
	 * Sets the path of the routes configuration.
	 * @param string $path The path of the routes configuration.
	 */
	public function setRoutesConfigurationPath( string $path ): void;

	/**
	 * Gets the path of the persistence configuration.
	 * @return string The path of the persistence configuration.
	 */
	public function getPersistenceConfiguration(): PersistenceConfigurationInterface;

	/**
	 * Sets the path of the persistence configuration.
	 * @param string $path The path of the persistence configuration.
	 */
	public function setPersistenceConfigurationPath( string $path ): void;

	/**
	 * Gets the path of the template renderer configuration.
	 * @return string The path of the template renderer configuration.
	 */
	public function getTemplateRendererConfiguration(): TemplateRendererConfigurationInterface;

	/**
	 * Sets the path of the template renderer configuration.
	 * @param string $path The path of the template renderer configuration.
	 */
	public function setTemplateRendererConfigurationPath( string $path ): void;

	/**
	 * Gets the path of the URI builder configuration.
	 * @return string The path of the URI builder configuration.
	 */
	public function getUriBuilderConfiguration(): UriBuilderConfigurationInterface;

	/**
	 * Sets the path of the URI builder configuration.
	 * @param string $path The path of the URI builder configuration.
	 */
	public function setUriBuilderConfigurationPath( string $path ): void;
}

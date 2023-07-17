<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\ConfigurationInterface;

/**
 * Represents the interface of any routes configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RoutesConfigurationInterface extends ConfigurationInterface
{
	/**
	 * Gets the base route of the application.
	 * @return string The base route of the application.
	 */
	public function getBaseRoute(): string;

	/**
	 * Gets the routes of the application.
	 * @return array The routes of the application.
	 */
	public function getRoutes(): array;
}

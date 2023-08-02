<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\ConfigurationInterface;

/**
 * Represents the interface of all routes preset configurations.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RoutesPresetConfigurationInterface extends ConfigurationInterface
{
	/**
	 * Gets the base route of the preset.
	 * @return string The base route of the preset.
	 */
	public function getBaseRoute(): string;

	/**
	 * Gets the routes of the preset.
	 * @return array The routes of the preset.
	 */
	public function getRoutes(): array;
}

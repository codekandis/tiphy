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
	 * Gets all routes presets of the application.
	 * @return RoutesPresetConfigurationInterface[] The routes presets of the application.
	 */
	public function getPresets(): array;

	/**
	 * Gets a routes preset configuration of the application specified by its ID.
	 * @param string $id The ID of the routes preset of the application.
	 * @return RoutesPresetConfigurationInterface The routes preset of the application.
	 */
	public function getPreset( string $id ): RoutesPresetConfigurationInterface;
}

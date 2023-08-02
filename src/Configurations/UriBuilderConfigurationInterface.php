<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\ConfigurationInterface;

/**
 * Represents the interface of any URI builder configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UriBuilderConfigurationInterface extends ConfigurationInterface
{
	/**
	 * Gets all URI builder presets of the application.
	 * @return UriBuilderPresetConfigurationInterface[] The URI builder presets of the application.
	 */
	public function getPresets(): array;

	/**
	 * Gets a URI builder preset configuration of the application specified by its ID.
	 * @param string $id The ID of the URI builder preset of the application.
	 * @return UriBuilderPresetConfigurationInterface The URI builder preset of the application.
	 */
	public function getPreset( string $id ): UriBuilderPresetConfigurationInterface;
}

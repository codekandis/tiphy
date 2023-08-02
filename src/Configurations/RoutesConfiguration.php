<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\AbstractConfiguration;
use function array_map;

/**
 * Represents a routes configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getPresets(): array
	{
		return array_map(
			function ( array $routesPreset )
			{
				return new RoutesPresetConfiguration( $routesPreset );
			},
			$this->plainConfiguration
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPreset( string $id ): RoutesPresetConfigurationInterface
	{
		return new RoutesPresetConfiguration(
			$this->read( $id )
		);
	}
}

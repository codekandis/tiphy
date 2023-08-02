<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\AbstractConfiguration;
use function array_map;

/**
 * Represents a URI builder configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class UriBuilderConfiguration extends AbstractConfiguration implements UriBuilderConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getPresets(): array
	{
		return array_map(
			function ( array $uriBuildersPreset )
			{
				return new UriBuilderPresetConfiguration( $uriBuildersPreset );
			},
			$this->plainConfiguration
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPreset( string $id ): UriBuilderPresetConfigurationInterface
	{
		return new UriBuilderPresetConfiguration(
			$this->read( $id )
		);
	}
}

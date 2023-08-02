<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\AbstractConfiguration;

/**
 * Represents a URI builder preset configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class UriBuilderPresetConfiguration extends AbstractConfiguration implements UriBuilderPresetConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getSchema(): string
	{
		return $this->read( 'schema' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHost(): string
	{
		return $this->read( 'host' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getBaseUri(): string
	{
		return $this->read( 'baseUri' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getRelativeUris(): array
	{
		return $this->read( 'relativeUris' );
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

/**
 * Represents an URI builder configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class UriBuilderConfiguration extends AbstractConfiguration implements UriBuilderConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getSchema(): string
	{
		return $this->data[ 'schema' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHost(): string
	{
		return $this->data[ 'host' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getBaseUri(): string
	{
		return $this->data[ 'baseUri' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getRelativeUris(): array
	{
		return $this->data[ 'relativeUris' ];
	}
}

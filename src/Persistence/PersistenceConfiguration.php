<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

/**
 * Represents a persistence configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistenceConfiguration extends AbstractConfiguration implements PersistenceConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getDriver(): string
	{
		return $this->data[ 'driver' ];
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
	public function getDatabase(): string
	{
		return $this->data[ 'database' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUser(): string
	{
		return $this->data[ 'user' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPassphrase(): string
	{
		return $this->data[ 'passphrase' ];
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class PersistenceConfiguration extends AbstractConfiguration implements PersistenceConfigurationInterface
{
	public function __construct( string $path )
	{
		parent::__construct( $path );
	}

	public function getDriver(): string
	{
		return $this->data[ 'driver' ];
	}

	public function getHost(): string
	{
		return $this->data[ 'host' ];
	}

	public function getDatabase(): string
	{
		return $this->data[ 'database' ];
	}

	public function getUser(): string
	{
		return $this->data[ 'user' ];
	}

	public function getPassphrase(): string
	{
		return $this->data[ 'passphrase' ];
	}
}

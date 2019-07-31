<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence;

use function dirname;

class PersistenceConfiguration implements PersistenceConfigurationInterface
{
	/** @var array */
	private $data;

	public function __construct()
	{
		$this->data = require dirname( __DIR__, 2 ) . '/config/persistence.php';
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

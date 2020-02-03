<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence;

/**
 * Represents the interface of all persistence configurations.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistenceConfigurationInterface
{
	/**
	 * Gets the driver used for the connection.
	 * @return string The driver used for the connection.
	 */
	public function getDriver(): string;

	/**
	 * Gets the host to connect to.
	 * @return string The host to connect to.
	 */
	public function getHost(): string;

	/**
	 * Gets the database name to connect to.
	 * @return string The database name to connect to.
	 */
	public function getDatabase(): string;

	/**
	 * Gets the user name to authenticate with.
	 * @return string The user name to authenticate with.
	 */
	public function getUser(): string;

	/**
	 * Gets the passphrase to authenticate with.
	 * @return string The passphrase to authenticate with.
	 */
	public function getPassphrase(): string;
}

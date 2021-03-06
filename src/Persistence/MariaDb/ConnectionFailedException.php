<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

/**
 * Represents an exception if a connection failed.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConnectionFailedException extends PersistenceException
{
}

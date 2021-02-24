<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

/**
 * Represents an exception if the retrieval of the last inserted ID has been failed.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RetrievingLastInsertedIdFailedException extends PersistenceException
{
}

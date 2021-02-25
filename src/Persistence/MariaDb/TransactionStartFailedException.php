<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

/**
 * Represents an exception if a transaction failed to start.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class TransactionStartFailedException extends TransactionalOperationFailedException
{
}

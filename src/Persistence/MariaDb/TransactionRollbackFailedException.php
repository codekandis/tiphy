<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

/**
 * Represents an exception if a transaction failed to roll back.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class TransactionRollbackFailedException extends TransactionalOperationFailedException
{
}

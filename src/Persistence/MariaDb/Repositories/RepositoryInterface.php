<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb\Repositories;

use Closure;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;

/**
 * Represents the interface of all MariaDB repositories.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RepositoryInterface
{
	/**
	 * Invokes a closure within a transaction.
	 * @param Closure $closure The closure to invoke.
	 * @param array $closureArguments The arguments to pass to the closure.
	 * @return mixed The return value of the closure.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 */
	public function asTransaction( Closure $closure, array ...$closureArguments );
}

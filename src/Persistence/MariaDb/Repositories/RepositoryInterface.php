<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb\Repositories;

use Closure;

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
	 */
	public function asTransaction( Closure $closure, array ...$closureArguments );
}

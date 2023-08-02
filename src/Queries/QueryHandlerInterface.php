<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Queries;

/**
 * Represents the interface of any query handler.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface QueryHandlerInterface
{
	/**
	 * Executes the query handler.
	 * @return QueryHandlerResultInterface The result of the query handler execution.
	 */
	public function execute(): QueryHandlerResultInterface;
}

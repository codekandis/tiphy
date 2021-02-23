<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Queries;

/**
 * Represents the result states of all query handlers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class QueryHandlerResultStates
{
	/**
	 * Represents the state if a query handler has been failed to execute.
	 * @var bool
	 */
	public const FAILED = false;

	/**
	 * Represents the state if a query handler has been succeeded to execute.
	 * @var bool
	 */
	public const SUCCEEDED = true;
}

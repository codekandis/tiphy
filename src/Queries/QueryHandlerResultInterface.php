<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Queries;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;

/**
 * Represents the interface of all query handler results.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface QueryHandlerResultInterface
{
	/**
	 * Gets the state of the query handler result.
	 * @return bool True if the query handler has been executed successfully, false otherwise.
	 */
	public function getState(): bool;

	/**
	 * Gets the errors if the query handler failed to execute.
	 * @return ErrorInformationInterface[] The errors if the query handler failed to execute.
	 */
	public function getErrors(): array;
}

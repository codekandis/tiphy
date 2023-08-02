<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Commands;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;

/**
 * Represents the interface of any command handler result.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CommandHandlerResultInterface
{
	/**
	 * Gets the state of the command handler result.
	 * @return bool True if the command handler has been executed successfully, false otherwise.
	 */
	public function getState(): bool;

	/**
	 * Gets the errors if the command handler failed to execute.
	 * @return ErrorInformationInterface[] The errors if the command handler failed to execute.
	 */
	public function getErrors(): array;
}

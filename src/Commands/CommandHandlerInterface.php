<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Commands;

/**
 * Represents the interface of any command handler.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CommandHandlerInterface
{
	/**
	 * Executes the command handler.
	 * @return CommandHandlerResultInterface The result of the command handler execution.
	 */
	public function execute(): CommandHandlerResultInterface;
}

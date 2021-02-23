<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Commands;

/**
 * Represents the result states of all command handlers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class CommandHandlerResultStates
{
	/**
	 * Represents the state if a command handler has been failed to execute.
	 * @var bool
	 */
	public const FAILED = false;

	/**
	 * Represents the state if a command handler has been succeeded to execute.
	 * @var bool
	 */
	public const SUCCEEDED = true;
}

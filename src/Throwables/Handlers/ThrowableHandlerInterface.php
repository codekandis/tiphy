<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables\Handlers;

use Throwable;

/**
 * Represents the interface of any throwable handler.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ThrowableHandlerInterface
{
	/**
	 * Executes the throwable handler.
	 * @param Throwable $throwable The throwable to handle.
	 */
	public function execute( Throwable $throwable ): void;
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use Throwable;

/**
 * Represents interface of all action dispatchers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ActionDispatcherInterface
{
	/**
	 * Dispatches a request to an action.
	 * @throws Throwable An error occurred during the processing of the request.
	 */
	public function dispatch(): void;
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions\PreDispatchment;

/**
 * Represents the interface of all pre-dispatchers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PreDispatcherInterface
{
	/**
	 * Executes the pre-dispatcher.
	 * @param PreDispatchmentStateInterface $dispatchmentState The dispatchment state.
	 */
	public function preDispatch( PreDispatchmentStateInterface $dispatchmentState ): void;
}

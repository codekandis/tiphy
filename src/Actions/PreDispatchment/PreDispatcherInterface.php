<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions\PreDispatchment;

/**
 * Represents the interface of any pre-dispatcher.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PreDispatcherInterface
{
	/**
	 * Executes the pre-dispatcher.
	 * @param string The requested URI of the client.
	 * @param PreDispatchmentStateInterface $dispatchmentState The dispatchment state.
	 */
	public function preDispatch( string $requestedUri, PreDispatchmentStateInterface $dispatchmentState ): void;
}

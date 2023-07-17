<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions\PreDispatchment;

/**
 * Represents the interface of any pre-dispatchment state.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PreDispatchmentStateInterface
{
	/**
	 * Gets if the dispatchment must be prevented.
	 * @return bool True if the dispatchment must be prevented, false otherwise.
	 */
	public function getPreventDispatchment(): bool;

	/**
	 * Sets if the dispatchment must be prevented.
	 * @param bool $preventDispatchment True if the dispatchment must be prevented, false otherwise.
	 */
	public function setPreventDispatchment( bool $preventDispatchment ): void;
}

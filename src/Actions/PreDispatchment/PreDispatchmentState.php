<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions\PreDispatchment;

/**
 * Represents a pre-dispatchment state.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class PreDispatchmentState implements PreDispatchmentStateInterface
{
	/**
	 * Stores if the dispatchment must be prevented.
	 * @var bool
	 */
	private bool $preventDispatchment = false;

	/**
	 * @inheritDoc
	 */
	public function getPreventDispatchment(): bool
	{
		return $this->preventDispatchment;
	}

	/**
	 * @inheritDoc
	 */
	public function setPreventDispatchment( bool $preventDispatchment ): void
	{
		$this->preventDispatchment = $preventDispatchment;
	}
}

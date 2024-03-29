<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

/**
 * Represents the interface of any action.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ActionInterface
{
	/**
	 * Executes the action.
	 */
	public function execute(): void;
}

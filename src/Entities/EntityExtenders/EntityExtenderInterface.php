<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityExtenders;

/**
 * Represents the interface of all entity extenders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityExtenderInterface
{
	/**
	 * Extends the entites.
	 */
	public function extend(): void;
}

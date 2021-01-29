<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\UriExtenders;

/**
 * Represents the interface of all URI extenders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UriExtenderInterface
{
	/**
	 * Extends an URI.
	 */
	public function extend(): void;
}

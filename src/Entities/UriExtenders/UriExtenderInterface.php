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
	 * Extends the URIs.
	 */
	public function extend(): void;
}

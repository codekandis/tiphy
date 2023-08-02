<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents the interface of any HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ResponderInterface
{
	/**
	 * Adds a response header to the response.
	 * @param string $name The name of the response header.
	 * @param string $value The value of the response header.
	 */
	public function addHeader( string $name, string $value ): void;

	/**
	 * Responds the response.
	 */
	public function respond(): void;
}

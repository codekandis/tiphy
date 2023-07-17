<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

/**
 * Represents the interface of any response header.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ResponseHeadersInterface
{
	/**
	 * Gets the value of a specific response header.
	 * @param string $headerName The name of the response header.
	 * @return string The response header value.
	 */
	public function getHeader( string $headerName ): string;
}

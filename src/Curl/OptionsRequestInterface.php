<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

/**
 * Represents the interface of any HTTP `OPTIONS` request.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface OptionsRequestInterface
{
	/**
	 * Executes the request.
	 * @return string[] The response headers of the request.
	 */
	public function execute(): array;
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

/**
 * Represents the interface of all JSON bodies.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface JsonBodyInterface
{
	/**
	 * Gets the content of the JSON body.
	 * @return mixed The content of the JSON body.
	 * @throws BadRequestException An error occured during the decoding of the JSON body.
	 */
	public function getContent();
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\Requests\Range;

/**
 * Represents the interface of all octet stream HTTP responders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface OctetStreamResponderInterface extends ResponderInterface
{
	/**
	 * Sets the file name of the octet stream.
	 * @param string $fileName The file name of the octet stream.
	 */
	public function setFileName( string $fileName ): void;

	/**
	 * Sets the range of the octet stream.
	 * @param Range $range The range of the octet stream.
	 */
	public function setRange( Range $range ): void;
}

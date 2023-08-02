<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents the interface of any CSV HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CsvResponderInterface extends ResponderInterface
{
	/**
	 * Sets the file name of the CSV.
	 * @param string $fileName The file name of the CSV.
	 */
	public function setFileName( string $fileName ): void;
}

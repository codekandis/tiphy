<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents the interface of any PDF HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PdfResponderInterface extends ResponderInterface
{
	/**
	 * Sets the file name of the PDF.
	 * @param string $fileName The file name of the PDF.
	 */
	public function setFileName( string $fileName ): void;
}

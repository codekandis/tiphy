<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

/**
 * Represents an enumeration of content types.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class ContentTypes
{
	/**
	 * Represents the JSON data content type.
	 * @var string
	 */
	public const APPLICATION_JSON = 'application/json';

	/**
	 * Represents the JSON data content type with the UTF-8 charset.
	 * @var string
	 */
	public const APPLICATION_JSON_UTF_8 = 'application/json; charset=utf-8';

	/**
	 * Represents the octet-stream content type.
	 * @var string
	 */
	public const APPLICATION_OCTET_STREAM = 'application/octet-stream';

	/**
	 * Represents the PDF content type.
	 * @var string
	 */
	public const APPLICATION_PDF = 'application/pdf';

	/**
	 * Represents the XML data content type.
	 * @var string
	 */
	public const APPLICATION_XML = 'application/xml';

	/**
	 * Represents the XML data content type with the UTF-8 charset.
	 * @var string
	 */
	public const APPLICATION_XML_UTF_8 = 'application/xml; charset=utf-8';

	/**
	 * Represents the HTTPD Unix directory content type.
	 * @var string
	 */
	public const HTTPD_UNIX_DIRECTORY = 'httpd/unix-directory';

	/**
	 * Represents the HTML content type.
	 * @var string
	 */
	public const TEXT_HTML = 'text/html';

	/**
	 * Represents the HTML content type with the UTF-8 charset.
	 * @var string
	 */
	public const TEXT_HTML_UTF_8 = 'text/html; charset=utf-8';

	/**
	 * Represents the plain text content type.
	 * @var string
	 */
	public const TEXT_PLAIN = 'text/plain';

	/**
	 * Represents the plain text content type with the UTF-8 charset.
	 * @var string
	 */
	public const TEXT_PLAIN_UTF_8 = 'text/plain; charset=utf-8';
}

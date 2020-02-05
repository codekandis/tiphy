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
	 * Defines the JSON data content type.
	 * @var string
	 */
	public const APPLICATION_JSON = 'application/json; charset=utf-8';

	/**
	 * Defines the octet stream content type.
	 * @var string
	 */
	public const APPLICATION_OCTET_STREAM = 'application/octet-stream';

	/**
	 * Defines the HTTPD Unix directory content type.
	 * @var string
	 */
	public const HTTPD_UNIX_DIRECTORY = 'httpd/unix-directory';

	/**
	 * Defines the HTML content type.
	 * @var string
	 */
	public const TEXT_HTML = 'text/html; charset=utf-8';

	/**
	 * Defines the plain text content type.
	 * @var string
	 */
	public const TEXT_PLAIN = 'text/plain; charset=utf-8';
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents an enumeration of HTTP response headers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class Headers
{
	/**
	 * Represents the HTTP `Accept-Ranges` header.
	 * @var string
	 */
	public const ACCEPT_RANGES = 'Accept-Ranges';

	/**
	 * Represents the HTTP `Access-Control-Allow-Origin` header.
	 * @var string
	 */
	public const ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

	/**
	 * Represents the HTTP `Cache-Control` header.
	 * @var string
	 */
	public const CACHE_CONTROL = 'Cache-Control';

	/**
	 * Represents the HTTP `Content-Dispositon` header.
	 * @var string
	 */
	public const CONTENT_DISPOSITION = 'Content-Disposition';

	/**
	 * Represents the HTTP `Content-Length` header.
	 * @var string
	 */
	public const CONTENT_LENGTH = 'Content-Length';

	/**
	 * Represents the HTTP `Content-Range` header.
	 * @var string
	 */
	public const CONTENT_RANGE = 'Content-Range';

	/**
	 * Represents the HTTP `Content-Type` header.
	 * @var string
	 */
	public const CONTENT_TYPE = 'Content-Type';

	/**
	 * Represents the HTTP `Location` header.
	 * @var string
	 */
	public const LOCATION = 'Location';
}

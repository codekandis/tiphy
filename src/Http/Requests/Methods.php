<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

/**
 * Represents an enumeration of request methods.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class Methods
{
	public const GET       = 'GET';

	public const CONNECT   = 'CONNECT';

	public const COPY      = 'COPY';

	public const DELETE    = 'DELETE';

	public const HEAD      = 'HEAD';

	public const HTTP      = 'HTTP';

	public const LOCK      = 'LOCK';

	public const MKCOL     = 'MKCOL';

	public const MOVE      = 'MOVE';

	public const OPTIONS   = 'OPTIONS';

	public const PATCH     = 'PATCH';

	public const POST      = 'POST';

	public const PROPFIND  = 'PROPFIND';

	public const PROPPATCH = 'PROPPATCH';

	public const PUT       = 'PUT';

	public const TRACE     = 'TRACE';

	public const UNLOCK    = 'UNLOCK';
}

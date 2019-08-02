<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

abstract class Methods
{
	public const GET     = 'GET';

	public const CONNECT = 'CONNECT';

	public const DELETE  = 'DELETE';

	public const HEAD    = 'HEAD';

	public const OPTIONS = 'OPTIONS';

	public const PATCH   = 'PATCH';

	public const POST    = 'POST';

	public const PUT     = 'PUT';

	public const TRACE   = 'TRACE';
}

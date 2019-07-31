<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

abstract class StatusCodes
{
	public const OK                    = 200;

	public const PARTIAL_CONTENT       = 206;

	public const BAD_REQUEST           = 300;

	public const NOT_FOUND             = 404;

	public const METHOD_NOT_ALLOWED    = 405;

	public const RANGE_NOT_SATISFIABLE = 416;
}

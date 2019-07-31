<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

abstract class StatusMessages
{
	public const OK                    = 'OK';

	public const PARTIAL_CONTENT       = 'Partial Content';

	public const BAD_REQUEST           = 'Bad Request';

	public const NOT_FOUND             = 'Not Found';

	public const METHOD_NOT_ALLOWED    = 'Method Not Allowed';

	public const RANGE_NOT_SATISFIABLE = 'Range Not Satisfiable';
}

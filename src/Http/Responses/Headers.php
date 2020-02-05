<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

abstract class Headers
{
	public const ACCEPT_RANGES               = 'Accept-Ranges';

	public const ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

	public const CACHE_CONTROL               = 'Cache-Control';

	public const CONTENT_DISPOSITION         = 'Content-Disposition';

	public const CONTENT_LENGTH              = 'Content-Length';

	public const CONTENT_RANGE               = 'Content-Range';

	public const CONTENT_TYPE                = 'Content-Type';
}

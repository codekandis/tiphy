<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents an enumeration of HTTP response status codes.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class StatusCodes
{
	/**
	 * Represents the error code of the HTTP response status `100 Continue`.
	 * @var int
	 */
	public const CONTINUE = 100;

	/**
	 * Represents the error code of the HTTP response status `101 Switching Protocols`.
	 * @var int
	 */
	public const SWITCHING_PROTOCOLS = 101;

	/**
	 * Represents the error code of the HTTP response status `102 Processing`.
	 * @var int
	 */
	public const PROCESSING = 102;

	/**
	 * Represents the error code of the HTTP response status `103 Early Hints`.
	 * @var int
	 */
	public const EARLY_HINTS = 103;

	/**
	 * Represents the error code of the HTTP response status `200 OK`.
	 * @var int
	 */
	public const OK = 200;

	/**
	 * Represents the error code of the HTTP response status `201 Created`.
	 * @var int
	 */
	public const CREATED = 201;

	/**
	 * Represents the error code of the HTTP response status `202 Accepted`.
	 * @var int
	 */
	public const ACCEPTED = 202;

	/**
	 * Represents the error code of the HTTP response status `203 Non-Authoritative Information`.
	 * @var int
	 */
	public const NON_AUTHORITATIVE_INFORMATION = 203;

	/**
	 * Represents the error code of the HTTP response status `204 No Content`.
	 * @var int
	 */
	public const NO_CONTENT = 204;

	/**
	 * Represents the error code of the HTTP response status `205 Reset Content`.
	 * @var int
	 */
	public const RESET_CONTENT = 205;

	/**
	 * Represents the error code of the HTTP response status `206 Partial Content`.
	 * @var int
	 */
	public const PARTIAL_CONTENT = 206;

	/**
	 * Represents the error code of the HTTP response status `207 Multi-Status`.
	 * @var int
	 */
	public const MULTI_STATUS = 207;

	/**
	 * Represents the error code of the HTTP response status `208 Already Reported`.
	 * @var int
	 */
	public const ALREADY_REPORTED = 208;

	/**
	 * Represents the error code of the HTTP response status `226 IM Used`.
	 * @var int
	 */
	public const IM_USED = 226;

	/**
	 * Represents the error code of the HTTP response status `300 Multiple Choices`.
	 * @var int
	 */
	public const MULTIPLE_CHOICES = 300;

	/**
	 * Represents the error code of the HTTP response status `301 Moved Permanently`.
	 * @var int
	 */
	public const MOVED_PERMANENTLY = 301;

	/**
	 * Represents the error code of the HTTP response status `302 Found`.
	 * @var int
	 */
	public const FOUND = 302;

	/**
	 * Represents the error code of the HTTP response status `303 See Other`.
	 * @var int
	 */
	public const SEE_OTHER = 303;

	/**
	 * Represents the error code of the HTTP response status `304 Not Modified`.
	 * @var int
	 */
	public const NOT_MODIFIED = 304;

	/**
	 * Represents the error code of the HTTP response status `305 Use Proxy`.
	 * @var int
	 */
	public const USE_PROXY = 305;

	/**
	 * Represents the error code of the HTTP response status `306 Switch Proxy`.
	 * @var int
	 */
	public const SWITCH_PROXY = 306;

	/**
	 * Represents the error code of the HTTP response status `307 Temporary Redirect`.
	 * @var int
	 */
	public const TEMPORARY_REDIRECT = 307;

	/**
	 * Represents the error code of the HTTP response status `308 Permanent Redirect`.
	 * @var int
	 */
	public const PERMANENT_REDIRECT = 308;

	/**
	 * Represents the error code of the HTTP response status `400 Bad Request`.
	 * @var int
	 */
	public const BAD_REQUEST = 400;

	/**
	 * Represents the error code of the HTTP response status `401 Unauthorized`.
	 * @var int
	 */
	public const UNAUTHORIZED = 401;

	/**
	 * Represents the error code of the HTTP response status `402 Payment Required`.
	 * @var int
	 */
	public const PAYMENT_REQUIRED = 402;

	/**
	 * Represents the error code of the HTTP response status `403 Forbidden`.
	 * @var int
	 */
	public const FORBIDDEN = 403;

	/**
	 * Represents the error code of the HTTP response status `404 Not Found`.
	 * @var int
	 */
	public const NOT_FOUND = 404;

	/**
	 * Represents the error code of the HTTP response status `405 Method Not Allowed`.
	 * @var int
	 */
	public const METHOD_NOT_ALLOWED = 405;

	/**
	 * Represents the error code of the HTTP response status `406 Not Acceptable`.
	 * @var int
	 */
	public const NOT_ACCEPTABLE = 406;

	/**
	 * Represents the error code of the HTTP response status `407 Proxy Authentication Required`.
	 * @var int
	 */
	public const PROXY_AUTHENTICATION_REQUIRED = 407;

	/**
	 * Represents the error code of the HTTP response status `408 Request Timeout`.
	 * @var int
	 */
	public const REQUEST_TIMEOUT = 408;

	/**
	 * Represents the error code of the HTTP response status `409 Conflict`.
	 * @var int
	 */
	public const CONFLICT = 409;

	/**
	 * Represents the error code of the HTTP response status `410 Gone`.
	 * @var int
	 */
	public const GONE = 410;

	/**
	 * Represents the error code of the HTTP response status `411 Length Required`.
	 * @var int
	 */
	public const LENGTH_REQUIRED = 411;

	/**
	 * Represents the error code of the HTTP response status `412 Precondition Failed`.
	 * @var int
	 */
	public const PRECONDITION_FAILED = 412;

	/**
	 * Represents the error code of the HTTP response status `413 Request Entity Too Large`.
	 * @var int
	 */
	public const REQUEST_ENTITY_TOO_LARGE = 413;

	/**
	 * Represents the error code of the HTTP response status `414 URI Too Long`.
	 * @var int
	 */
	public const URI_TOO_LONG = 414;

	/**
	 * Represents the error code of the HTTP response status `415 Unsupported Media Type`.
	 * @var int
	 */
	public const UNSUPPORTED_MEDIA_TYPE = 415;

	/**
	 * Represents the error code of the HTTP response status `416 Requested range not satisfiable`.
	 * @var int
	 */
	public const REQUESTED_RANGE_NOT_SATISFIABLE = 416;

	/**
	 * Represents the error code of the HTTP response status `417 Expectation Failed`.
	 * @var int
	 */
	public const EXPECTATION_FAILED = 417;

	/**
	 * Represents the error code of the HTTP response status `418`.
	 * @var int
	 */
	public const IM_A_TEAPOT = 418;

	/**
	 * Represents the error code of the HTTP response status `420 Policy Not Fulfilled`.
	 * @var int
	 */
	public const POLICY_NOT_FULFILLED = 420;

	/**
	 * Represents the error code of the HTTP response status `421 Misdirected Request`.
	 * @var int
	 */
	public const MISDIRECTED_REQUEST = 421;

	/**
	 * Represents the error code of the HTTP response status `422 Unprocessable Entity`.
	 * @var int
	 */
	public const UNPROCESSABLE_ENTITY = 422;

	/**
	 * Represents the error code of the HTTP response status `423 Locked`.
	 * @var int
	 */
	public const LOCKED = 423;

	/**
	 * Represents the error code of the HTTP response status `424 Failed Dependency`.
	 * @var int
	 */
	public const FAILED_DEPENDENCY = 424;

	/**
	 * Represents the error code of the HTTP response status `425 Unordered Collection`.
	 * @var int
	 */
	public const UNORDERED_COLLECTION = 425;

	/**
	 * Represents the error code of the HTTP response status `426 Upgrade Required`.
	 * @var int
	 */
	public const UPGRADE_REQUIRED = 426;

	/**
	 * Represents the error code of the HTTP response status `428 Precondition Required`.
	 * @var int
	 */
	public const PRECONDITION_REQUIRED = 428;

	/**
	 * Represents the error code of the HTTP response status `429 Too Many Requests`.
	 * @var int
	 */
	public const TOO_MANY_REQUESTS = 429;

	/**
	 * Represents the error code of the HTTP response status `431 Request Header Fields Too Large`.
	 * @var int
	 */
	public const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

	/**
	 * Represents the error code of the HTTP response status `444 No Response`.
	 * @var int
	 */
	public const NO_RESPONSE = 444;

	/**
	 * Represents the error code of the HTTP response status `449 The request should be retried after doing the appropriate action`.
	 * @var int
	 */
	public const THE_REQUEST_SHOULD_BE_RETRIED_AFTER_DOING_THE_APPROPRIATE_ACTION = 449;

	/**
	 * Represents the error code of the HTTP response status `451 Unavailable For Legal Reasons`.
	 * @var int
	 */
	public const UNAVAILABLE_FOR_LEGAL_REASONS = 451;

	/**
	 * Represents the error code of the HTTP response status `499 Client Closed Request`.
	 * @var int
	 */
	public const CLIENT_CLOSED_REQUEST = 499;

	/**
	 * Represents the error code of the HTTP response status `500 Internal Server Error`.
	 * @var int
	 */
	public const INTERNAL_SERVER_ERROR = 500;

	/**
	 * Represents the error code of the HTTP response status `501 Not Implemented`.
	 * @var int
	 */
	public const NOT_IMPLEMENTED = 501;

	/**
	 * Represents the error code of the HTTP response status `502 Bad Gateway`.
	 * @var int
	 */
	public const BAD_GATEWAY = 502;

	/**
	 * Represents the error code of the HTTP response status `503 Service Unavailable`.
	 * @var int
	 */
	public const SERVICE_UNAVAILABLE = 503;

	/**
	 * Represents the error code of the HTTP response status `504 Gateway Timeout`.
	 * @var int
	 */
	public const GATEWAY_TIMEOUT = 504;

	/**
	 * Represents the error code of the HTTP response status `505 HTTP Version not supported`.
	 * @var int
	 */
	public const HTTP_VERSION_NOT_SUPPORTED = 505;

	/**
	 * Represents the error code of the HTTP response status `506 Variant Also Negotiates`.
	 * @var int
	 */
	public const VARIANT_ALSO_NEGOTIATES = 506;

	/**
	 * Represents the error code of the HTTP response status `507 Insufficient Storage`.
	 * @var int
	 */
	public const INSUFFICIENT_STORAGE = 507;

	/**
	 * Represents the error code of the HTTP response status `508 Loop Detected`.
	 * @var int
	 */
	public const LOOP_DETECTED = 508;

	/**
	 * Represents the error code of the HTTP response status `509 Bandwidth Limit Exceeded`.
	 * @var int
	 */
	public const BANDWIDTH_LIMIT_EXCEEDED = 509;

	/**
	 * Represents the error code of the HTTP response status `510 Not Extended`.
	 * @var int
	 */
	public const NOT_EXTENDED = 510;

	/**
	 * Represents the error code of the HTTP response status `511 Network Authentication Required`.
	 * @var int
	 */
	public const NETWORK_AUTHENTICATION_REQUIRED = 511;
}

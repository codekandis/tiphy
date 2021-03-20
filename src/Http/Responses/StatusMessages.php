<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents an enumeration of HTTP response status messages.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class StatusMessages
{
	/**
	 * Represents the error message of the HTTP response status `100 Continue`.
	 * @var string
	 */
	public const CONTINUE = 'Continue';

	/**
	 * Represents the error message of the HTTP response status `101 Switching Protocols`.
	 * @var string
	 */
	public const SWITCHING_PROTOCOLS = 'Switching Protocols';

	/**
	 * Represents the error message of the HTTP response status `102 Processing`.
	 * @var string
	 */
	public const PROCESSING = 'Processing';

	/**
	 * Represents the error message of the HTTP response status `103 Early Hints`.
	 * @var string
	 */
	public const EARLY_HINTS = 'Early Hints';

	/**
	 * Represents the error message of the HTTP response status `200 OK`.
	 * @var string
	 */
	public const OK = 'OK';

	/**
	 * Represents the error message of the HTTP response status `201 Created`.
	 * @var string
	 */
	public const CREATED = 'Created';

	/**
	 * Represents the error message of the HTTP response status `202 Accepted`.
	 * @var string
	 */
	public const ACCEPTED = 'Accepted';

	/**
	 * Represents the error message of the HTTP response status `203 Non-Authoritative Information`.
	 * @var string
	 */
	public const NON_AUTHORITATIVE_INFORMATION = 'Non-Authoritative Information';

	/**
	 * Represents the error message of the HTTP response status `204 No Content`.
	 * @var string
	 */
	public const NO_CONTENT = 'No Content';

	/**
	 * Represents the error message of the HTTP response status `205 Reset Content`.
	 * @var string
	 */
	public const RESET_CONTENT = 'Reset Content';

	/**
	 * Represents the error message of the HTTP response status `206 Partial Content`.
	 * @var string
	 */
	public const PARTIAL_CONTENT = 'Partial Content';

	/**
	 * Represents the error message of the HTTP response status `207 Multi-Status`.
	 * @var string
	 */
	public const MULTI_STATUS = 'Multi-Status';

	/**
	 * Represents the error message of the HTTP response status `208 Already Reported`.
	 * @var string
	 */
	public const ALREADY_REPORTED = 'Already Reported';

	/**
	 * Represents the error message of the HTTP response status `226 IM Used`.
	 * @var string
	 */
	public const IM_USED = 'IM Used';

	/**
	 * Represents the error message of the HTTP response status `300 Multiple Choices`.
	 * @var string
	 */
	public const MULTIPLE_CHOICES = 'Multiple Choices';

	/**
	 * Represents the error message of the HTTP response status `301 Moved Permanently`.
	 * @var string
	 */
	public const MOVED_PERMANENTLY = 'Moved Permanently';

	/**
	 * Represents the error message of the HTTP response status `302 Found`.
	 * @var string
	 */
	public const FOUND = 'Found';

	/**
	 * Represents the error message of the HTTP response status `303 See Other`.
	 * @var string
	 */
	public const SEE_OTHER = 'See Other';

	/**
	 * Represents the error message of the HTTP response status `304 Not Modified`.
	 * @var string
	 */
	public const NOT_MODIFIED = 'Not Modified';

	/**
	 * Represents the error message of the HTTP response status `305 Use Proxy`.
	 * @var string
	 */
	public const USE_PROXY = 'Use Proxy';

	/**
	 * Represents the error message of the HTTP response status `306 Switch Proxy`.
	 * @var string
	 */
	public const SWITCH_PROXY = 'Switch Proxy';

	/**
	 * Represents the error message of the HTTP response status `307 Temporary Redirect`.
	 * @var string
	 */
	public const TEMPORARY_REDIRECT = 'Temporary Redirect';

	/**
	 * Represents the error message of the HTTP response status `308 Permanent Redirect`.
	 * @var string
	 */
	public const PERMANENT_REDIRECT = 'Permanent Redirect';

	/**
	 * Represents the error message of the HTTP response status `400 Bad Request`.
	 * @var string
	 */
	public const BAD_REQUEST = 'Bad Request';

	/**
	 * Represents the error message of the HTTP response status `401 Unauthorized`.
	 * @var string
	 */
	public const UNAUTHORIZED = 'Unauthorized';

	/**
	 * Represents the error message of the HTTP response status `402 Payment Required`.
	 * @var string
	 */
	public const PAYMENT_REQUIRED = 'Payment Required';

	/**
	 * Represents the error message of the HTTP response status `403 Forbidden`.
	 * @var string
	 */
	public const FORBIDDEN = 'Forbidden';

	/**
	 * Represents the error message of the HTTP response status `404 Not Found`.
	 * @var string
	 */
	public const NOT_FOUND = 'Not Found';

	/**
	 * Represents the error message of the HTTP response status `405 Method Not Allowed`.
	 * @var string
	 */
	public const METHOD_NOT_ALLOWED = 'Method Not Allowed';

	/**
	 * Represents the error message of the HTTP response status `406 Not Acceptable`.
	 * @var string
	 */
	public const NOT_ACCEPTABLE = 'Not Acceptable';

	/**
	 * Represents the error message of the HTTP response status `407 Proxy Authentication Required`.
	 * @var string
	 */
	public const PROXY_AUTHENTICATION_REQUIRED = 'Proxy Authentication Required';

	/**
	 * Represents the error message of the HTTP response status `408 Request Timeout`.
	 * @var string
	 */
	public const REQUEST_TIMEOUT = 'Request Timeout';

	/**
	 * Represents the error message of the HTTP response status `409 Conflict`.
	 * @var string
	 */
	public const CONFLICT = 'Conflict';

	/**
	 * Represents the error message of the HTTP response status `410 Gone`.
	 * @var string
	 */
	public const GONE = 'Gone';

	/**
	 * Represents the error message of the HTTP response status `411 Length Required`.
	 * @var string
	 */
	public const LENGTH_REQUIRED = 'Length Required';

	/**
	 * Represents the error message of the HTTP response status `412 Precondition Failed`.
	 * @var string
	 */
	public const PRECONDITION_FAILED = 'Precondition Failed';

	/**
	 * Represents the error message of the HTTP response status `413 Request Entity Too Large`.
	 * @var string
	 */
	public const REQUEST_ENTITY_TOO_LARGE = 'Request Entity Too Large';

	/**
	 * Represents the error message of the HTTP response status `414 URI Too Long`.
	 * @var string
	 */
	public const URI_TOO_LONG = 'URI Too Long';

	/**
	 * Represents the error message of the HTTP response status `415 Unsupported Media Type`.
	 * @var string
	 */
	public const UNSUPPORTED_MEDIA_TYPE = 'Unsupported Media Type';

	/**
	 * Represents the error message of the HTTP response status `416 Requested range not satisfiable`.
	 * @var string
	 */
	public const REQUESTED_RANGE_NOT_SATISFIABLE = 'Requested range not satisfiable';

	/**
	 * Represents the error message of the HTTP response status `417 Expectation Failed`.
	 * @var string
	 */
	public const EXPECTATION_FAILED = 'Expectation Failed';

	/**
	 * Represents the error message of the HTTP response status `418`.
	 * @var string
	 */
	public const IM_A_TEAPOT = 'I\'m a teapot';

	/**
	 * Represents the error message of the HTTP response status `420 Policy Not Fulfilled`.
	 * @var string
	 */
	public const POLICY_NOT_FULFILLED = 'Policy Not Fulfilled';

	/**
	 * Represents the error message of the HTTP response status `421 Misdirected Request`.
	 * @var string
	 */
	public const MISDIRECTED_REQUEST = 'Misdirected Request';

	/**
	 * Represents the error message of the HTTP response status `422 Unprocessable Entity`.
	 * @var string
	 */
	public const UNPROCESSABLE_ENTITY = 'Unprocessable Entity';

	/**
	 * Represents the error message of the HTTP response status `423 Locked`.
	 * @var string
	 */
	public const LOCKED = 'Locked';

	/**
	 * Represents the error message of the HTTP response status `424 Failed Dependency`.
	 * @var string
	 */
	public const FAILED_DEPENDENCY = 'Failed Dependency';

	/**
	 * Represents the error message of the HTTP response status `425 Unordered Collection`.
	 * @var string
	 */
	public const UNORDERED_COLLECTION = 'Unordered Collection';

	/**
	 * Represents the error message of the HTTP response status `426 Upgrade Required`.
	 * @var string
	 */
	public const UPGRADE_REQUIRED = 'Upgrade Required';

	/**
	 * Represents the error message of the HTTP response status `428 Precondition Required`.
	 * @var string
	 */
	public const PRECONDITION_REQUIRED = 'Precondition Required';

	/**
	 * Represents the error message of the HTTP response status `429 Too Many Requests`.
	 * @var string
	 */
	public const TOO_MANY_REQUESTS = 'Too Many Requests';

	/**
	 * Represents the error message of the HTTP response status `431 Request Header Fields Too Large`.
	 * @var string
	 */
	public const REQUEST_HEADER_FIELDS_TOO_LARGE = 'Request Header Fields Too Large';

	/**
	 * Represents the error message of the HTTP response status `444 No Response`.
	 * @var string
	 */
	public const NO_RESPONSE = 'No Response';

	/**
	 * Represents the error message of the HTTP response status `449 The request should be retried after doing the appropriate action`.
	 * @var string
	 */
	public const THE_REQUEST_SHOULD_BE_RETRIED_AFTER_DOING_THE_APPROPRIATE_ACTION = 'The request should be retried after doing the appropriate action';

	/**
	 * Represents the error message of the HTTP response status `451 Unavailable For Legal Reasons`.
	 * @var string
	 */
	public const UNAVAILABLE_FOR_LEGAL_REASONS = 'Unavailable For Legal Reasons';

	/**
	 * Represents the error message of the HTTP response status `499 Client Closed Request`.
	 * @var string
	 */
	public const CLIENT_CLOSED_REQUEST = 'Client Closed Request';

	/**
	 * Represents the error message of the HTTP response status `500 Internal Server Error`.
	 * @var string
	 */
	public const INTERNAL_SERVER_ERROR = 'Internal Server Error';

	/**
	 * Represents the error message of the HTTP response status `501 Not Implemented`.
	 * @var string
	 */
	public const NOT_IMPLEMENTED = 'Not Implemented';

	/**
	 * Represents the error message of the HTTP response status `502 Bad Gateway`.
	 * @var string
	 */
	public const BAD_GATEWAY = 'Bad Gateway';

	/**
	 * Represents the error message of the HTTP response status `503 Service Unavailable`.
	 * @var string
	 */
	public const SERVICE_UNAVAILABLE = 'Service Unavailable';

	/**
	 * Represents the error message of the HTTP response status `504 Gateway Timeout`.
	 * @var string
	 */
	public const GATEWAY_TIMEOUT = 'Gateway Timeout';

	/**
	 * Represents the error message of the HTTP response status `505 HTTP Version not supported`.
	 * @var string
	 */
	public const HTTP_VERSION_NOT_SUPPORTED = 'HTTP Version not supported';

	/**
	 * Represents the error message of the HTTP response status `506 Variant Also Negotiates`.
	 * @var string
	 */
	public const VARIANT_ALSO_NEGOTIATES = 'Variant Also Negotiates';

	/**
	 * Represents the error message of the HTTP response status `507 Insufficient Storage`.
	 * @var string
	 */
	public const INSUFFICIENT_STORAGE = 'Insufficient Storage';

	/**
	 * Represents the error message of the HTTP response status `508 Loop Detected`.
	 * @var string
	 */
	public const LOOP_DETECTED = 'Loop Detected';

	/**
	 * Represents the error message of the HTTP response status `509 Bandwidth Limit Exceeded`.
	 * @var string
	 */
	public const BANDWIDTH_LIMIT_EXCEEDED = 'Bandwidth Limit Exceeded';

	/**
	 * Represents the error message of the HTTP response status `510 Not Extended`.
	 * @var string
	 */
	public const NOT_EXTENDED = 'Not Extended';

	/**
	 * Represents the error message of the HTTP response status `511 Network Authentication Required`.
	 * @var string
	 */
	public const NETWORK_AUTHENTICATION_REQUIRED = 'Network Authentication Required';
}

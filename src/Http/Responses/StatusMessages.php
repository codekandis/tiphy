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
	 * Represents the response status message `100 Continue`.
	 * @var string
	 */
	public const CONTINUE = 'Continue';

	/**
	 * Represents the response status message `101 Switching Protocols`.
	 * @var string
	 */
	public const SWITCHING_PROTOCOLS = 'Switching Protocols';

	/**
	 * Represents the response status message `102 Processing`.
	 * @var string
	 */
	public const PROCESSING = 'Processing';

	/**
	 * Represents the response status message `103 Early Hints`.
	 * @var string
	 */
	public const EARLY_HINTS = 'Early Hints';

	/**
	 * Represents the response status message `200 OK`.
	 * @var string
	 */
	public const OK = 'OK';

	/**
	 * Represents the response status message `201 Created`.
	 * @var string
	 */
	public const CREATED = 'Created';

	/**
	 * Represents the response status message `202 Accepted`.
	 * @var string
	 */
	public const ACCEPTED = 'Accepted';

	/**
	 * Represents the response status message `203 Non-Authoritative Information`.
	 * @var string
	 */
	public const NON_AUTHORITATIVE_INFORMATION = 'Non-Authoritative Information';

	/**
	 * Represents the response status message `204 No Content`.
	 * @var string
	 */
	public const NO_CONTENT = 'No Content';

	/**
	 * Represents the response status message `205 Reset Content`.
	 * @var string
	 */
	public const RESET_CONTENT = 'Reset Content';

	/**
	 * Represents the response status message `206 Partial Content`.
	 * @var string
	 */
	public const PARTIAL_CONTENT = 'Partial Content';

	/**
	 * Represents the response status message `207 Multi-Status`.
	 * @var string
	 */
	public const MULTI_STATUS = 'Multi-Status';

	/**
	 * Represents the response status message `208 Already Reported`.
	 * @var string
	 */
	public const ALREADY_REPORTED = 'Already Reported';

	/**
	 * Represents the response status message `226 IM Used`.
	 * @var string
	 */
	public const IM_USED = 'IM Used';

	/**
	 * Represents the response status message `300 Multiple Choices`.
	 * @var string
	 */
	public const MULTIPLE_CHOICES = 'Multiple Choices';

	/**
	 * Represents the response status message `301 Moved Permanently`.
	 * @var string
	 */
	public const MOVED_PERMANENTLY = 'Moved Permanently';

	/**
	 * Represents the response status message `302 Found`.
	 * @var string
	 */
	public const FOUND = 'Found';

	/**
	 * Represents the response status message `303 See Other`.
	 * @var string
	 */
	public const SEE_OTHER = 'See Other';

	/**
	 * Represents the response status message `304 Not Modified`.
	 * @var string
	 */
	public const NOT_MODIFIED = 'Not Modified';

	/**
	 * Represents the response status message `305 Use Proxy`.
	 * @var string
	 */
	public const USE_PROXY = 'Use Proxy';

	/**
	 * Represents the response status message `306 Switch Proxy`.
	 * @var string
	 */
	public const SWITCH_PROXY = 'Switch Proxy';

	/**
	 * Represents the response status message `307 Temporary Redirect`.
	 * @var string
	 */
	public const TEMPORARY_REDIRECT = 'Temporary Redirect';

	/**
	 * Represents the response status message `308 Permanent Redirect`.
	 * @var string
	 */
	public const PERMANENT_REDIRECT = 'Permanent Redirect';

	/**
	 * Represents the response status message `400 Bad Request`.
	 * @var string
	 */
	public const BAD_REQUEST = 'Bad Request';

	/**
	 * Represents the response status message `401 Unauthorized`.
	 * @var string
	 */
	public const UNAUTHORIZED = 'Unauthorized';

	/**
	 * Represents the response status message `402 Payment Required`.
	 * @var string
	 */
	public const PAYMENT_REQUIRED = 'Payment Required';

	/**
	 * Represents the response status message `403 Forbidden`.
	 * @var string
	 */
	public const FORBIDDEN = 'Forbidden';

	/**
	 * Represents the response status message `404 Not Found`.
	 * @var string
	 */
	public const NOT_FOUND = 'Not Found';

	/**
	 * Represents the response status message `405 Method Not Allowed`.
	 * @var string
	 */
	public const METHOD_NOT_ALLOWED = 'Method Not Allowed';

	/**
	 * Represents the response status message `406 Not Acceptable`.
	 * @var string
	 */
	public const NOT_ACCEPTABLE = 'Not Acceptable';

	/**
	 * Represents the response status message `407 Proxy Authentication Required`.
	 * @var string
	 */
	public const PROXY_AUTHENTICATION_REQUIRED = 'Proxy Authentication Required';

	/**
	 * Represents the response status message `408 Request Timeout`.
	 * @var string
	 */
	public const REQUEST_TIMEOUT = 'Request Timeout';

	/**
	 * Represents the response status message `409 Conflict`.
	 * @var string
	 */
	public const CONFLICT = 'Conflict';

	/**
	 * Represents the response status message `410 Gone`.
	 * @var string
	 */
	public const GONE = 'Gone';

	/**
	 * Represents the response status message `411 Length Required`.
	 * @var string
	 */
	public const LENGTH_REQUIRED = 'Length Required';

	/**
	 * Represents the response status message `412 Precondition Failed`.
	 * @var string
	 */
	public const PRECONDITION_FAILED = 'Precondition Failed';

	/**
	 * Represents the response status message `413 Request Entity Too Large`.
	 * @var string
	 */
	public const REQUEST_ENTITY_TOO_LARGE = 'Request Entity Too Large';

	/**
	 * Represents the response status message `414 URI Too Long`.
	 * @var string
	 */
	public const URI_TOO_LONG = 'URI Too Long';

	/**
	 * Represents the response status message `415 Unsupported Media Type`.
	 * @var string
	 */
	public const UNSUPPORTED_MEDIA_TYPE = 'Unsupported Media Type';

	/**
	 * Represents the response status message `416 Requested range not satisfiable`.
	 * @var string
	 */
	public const REQUESTED_RANGE_NOT_SATISFIABLE = 'Requested range not satisfiable';

	/**
	 * Represents the response status message `417 Expectation Failed`.
	 * @var string
	 */
	public const EXPECTATION_FAILED = 'Expectation Failed';

	/**
	 * Represents the response status message `418`.
	 * @var string
	 */
	public const IM_A_TEAPOT = 'I\'m a teapot';

	/**
	 * Represents the response status message `420 Policy Not Fulfilled`.
	 * @var string
	 */
	public const POLICY_NOT_FULFILLED = 'Policy Not Fulfilled';

	/**
	 * Represents the response status message `421 Misdirected Request`.
	 * @var string
	 */
	public const MISDIRECTED_REQUEST = 'Misdirected Request';

	/**
	 * Represents the response status message `422 Unprocessable Entity`.
	 * @var string
	 */
	public const UNPROCESSABLE_ENTITY = 'Unprocessable Entity';

	/**
	 * Represents the response status message `423 Locked`.
	 * @var string
	 */
	public const LOCKED = 'Locked';

	/**
	 * Represents the response status message `424 Failed Dependency`.
	 * @var string
	 */
	public const FAILED_DEPENDENCY = 'Failed Dependency';

	/**
	 * Represents the response status message `425 Unordered Collection`.
	 * @var string
	 */
	public const UNORDERED_COLLECTION = 'Unordered Collection';

	/**
	 * Represents the response status message `426 Upgrade Required`.
	 * @var string
	 */
	public const UPGRADE_REQUIRED = 'Upgrade Required';

	/**
	 * Represents the response status message `428 Precondition Required`.
	 * @var string
	 */
	public const PRECONDITION_REQUIRED = 'Precondition Required';

	/**
	 * Represents the response status message `429 Too Many Requests`.
	 * @var string
	 */
	public const TOO_MANY_REQUESTS = 'Too Many Requests';

	/**
	 * Represents the response status message `431 Request Header Fields Too Large`.
	 * @var string
	 */
	public const REQUEST_HEADER_FIELDS_TOO_LARGE = 'Request Header Fields Too Large';

	/**
	 * Represents the response status message `444 No Response`.
	 * @var string
	 */
	public const NO_RESPONSE = 'No Response';

	/**
	 * Represents the response status message `449 The request should be retried after doing the appropriate action`.
	 * @var string
	 */
	public const THE_REQUEST_SHOULD_BE_RETRIED_AFTER_DOING_THE_APPROPRIATE_ACTION = 'The request should be retried after doing the appropriate action';

	/**
	 * Represents the response status message `451 Unavailable For Legal Reasons`.
	 * @var string
	 */
	public const UNAVAILABLE_FOR_LEGAL_REASONS = 'Unavailable For Legal Reasons';

	/**
	 * Represents the response status message `499 Client Closed Request`.
	 * @var string
	 */
	public const CLIENT_CLOSED_REQUEST = 'Client Closed Request';

	/**
	 * Represents the response status message `500 Internal Server Error`.
	 * @var string
	 */
	public const INTERNAL_SERVER_ERROR = 'Internal Server Error';

	/**
	 * Represents the response status message `501 Not Implemented`.
	 * @var string
	 */
	public const NOT_IMPLEMENTED = 'Not Implemented';

	/**
	 * Represents the response status message `502 Bad Gateway`.
	 * @var string
	 */
	public const BAD_GATEWAY = 'Bad Gateway';

	/**
	 * Represents the response status message `503 Service Unavailable`.
	 * @var string
	 */
	public const SERVICE_UNAVAILABLE = 'Service Unavailable';

	/**
	 * Represents the response status message `504 Gateway Timeout`.
	 * @var string
	 */
	public const GATEWAY_TIMEOUT = 'Gateway Timeout';

	/**
	 * Represents the response status message `505 HTTP Version not supported`.
	 * @var string
	 */
	public const HTTP_VERSION_NOT_SUPPORTED = 'HTTP Version not supported';

	/**
	 * Represents the response status message `506 Variant Also Negotiates`.
	 * @var string
	 */
	public const VARIANT_ALSO_NEGOTIATES = 'Variant Also Negotiates';

	/**
	 * Represents the response status message `507 Insufficient Storage`.
	 * @var string
	 */
	public const INSUFFICIENT_STORAGE = 'Insufficient Storage';

	/**
	 * Represents the response status message `508 Loop Detected`.
	 * @var string
	 */
	public const LOOP_DETECTED = 'Loop Detected';

	/**
	 * Represents the response status message `509 Bandwidth Limit Exceeded`.
	 * @var string
	 */
	public const BANDWIDTH_LIMIT_EXCEEDED = 'Bandwidth Limit Exceeded';

	/**
	 * Represents the response status message `510 Not Extended`.
	 * @var string
	 */
	public const NOT_EXTENDED = 'Not Extended';

	/**
	 * Represents the response status message `511 Network Authentication Required`.
	 * @var string
	 */
	public const NETWORK_AUTHENTICATION_REQUIRED = 'Network Authentication Required';
}

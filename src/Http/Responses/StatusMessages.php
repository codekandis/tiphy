<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

abstract class StatusMessages
{
	public const CONTINUE                                                         = 'Continue';

	public const SWITCHING_PROTOCOLS                                              = 'Switching Protocols';

	public const PROCESSING                                                       = 'Processing';

	public const OK                                                               = 'OK';

	public const CREATED                                                          = 'Created';

	public const ACCEPTED                                                         = 'Accepted';

	public const NON_AUTHORITATIVE_INFORMATION                                    = 'Non-Authoritative Information';

	public const NO_CONTENT                                                       = 'No Content';

	public const RESET_CONTENT                                                    = 'Reset Content';

	public const PARTIAL_CONTENT                                                  = 'Partial Content';

	public const MULTI_STATUS                                                     = 'Multi-Status';

	public const ALREADY_REPORTED                                                 = 'Already Reported';

	public const IM_USED                                                          = 'IM Used';

	public const MULTIPLE_CHOICES                                                 = 'Multiple Choices';

	public const MOVED_PERMANENTLY                                                = 'Moved Permanently';

	public const FOUND                                                            = 'Found';

	public const SEE_OTHER                                                        = 'See Other';

	public const NOT_MODIFIED                                                     = 'Not Modified';

	public const USE_PROXY                                                        = 'Use Proxy';

	public const SWITCH_PROXY                                                     = 'Switch Proxy';

	public const TEMPORARY_REDIRECT                                               = 'Temporary Redirect';

	public const PERMANENT_REDIRECT                                               = 'Permanent Redirect';

	public const BAD_REQUEST                                                      = 'Bad Request';

	public const UNAUTHORIZED                                                     = 'Unauthorized';

	public const PAYMENT_REQUIRED                                                 = 'Payment Required';

	public const FORBIDDEN                                                        = 'Forbidden';

	public const NOT_FOUND                                                        = 'Not Found';

	public const METHOD_NOT_ALLOWED                                               = 'Method Not Allowed';

	public const NOT_ACCEPTABLE                                                   = 'Not Acceptable';

	public const PROXY_AUTHENTICATION_REQUIRED                                    = 'Proxy Authentication Required';

	public const REQUEST_TIMEOUT                                                  = 'Request Timeout';

	public const CONFLICT                                                         = 'Conflict';

	public const GONE                                                             = 'Gone';

	public const LENGTH_REQUIRED                                                  = 'Length Required';

	public const PRECONDITION_FAILED                                              = 'Precondition Failed';

	public const REQUEST_ENTITY_TOO_LARGE                                         = 'Request Entity Too Large';

	public const URI_TOO_LONG                                                     = 'URI Too Long';

	public const UNSUPPORTED_MEDIA_TYPE                                           = 'Unsupported Media Type';

	public const REQUESTED_RANGE_NOT_SATISFIABLE                                  = 'Requested range not satisfiable';

	public const EXPECTATION_FAILED                                               = 'Expectation Failed';

	public const IM_A_TEAPOT                                                      = 'I\'m a teapot';

	public const POLICY_NOT_FULFILLED                                             = 'Policy Not Fulfilled';

	public const MISDIRECTED_REQUEST                                              = 'Misdirected Request';

	public const UNPROCESSABLE_ENTITY                                             = 'Unprocessable Entity';

	public const LOCKED                                                           = 'Locked';

	public const FAILED_DEPENDENCY                                                = 'Failed Dependency';

	public const UNORDERED_COLLECTION                                             = 'Unordered Collection';

	public const UPGRADE_REQUIRED                                                 = 'Upgrade Required';

	public const PRECONDITION_REQUIRED                                            = 'Precondition Required';

	public const TOO_MANY_REQUESTS                                                = 'Too Many Requests';

	public const REQUEST_HEADER_FIELDS_TOO_LARGE                                  = 'Request Header Fields Too Large';

	public const NO_RESPONSE                                                      = 'No Response';

	public const THE_REQUEST_SHOULD_BE_RETRIED_AFTER_DOING_THE_APPROPRIATE_ACTION = 'The request should be retried after doing the appropriate action';

	public const UNAVAILABLE_FOR_LEGAL_REASONS                                    = 'Unavailable For Legal Reasons';

	public const CLIENT_CLOSED_REQUEST                                            = 'Client Closed Request';

	public const INTERNAL_SERVER_ERROR                                            = 'Internal Server Error';

	public const NOT_IMPLEMENTED                                                  = 'Not Implemented';

	public const BAD_GATEWAY                                                      = 'Bad Gateway';

	public const SERVICE_UNAVAILABLE                                              = 'Service Unavailable';

	public const GATEWAY_TIMEOUT                                                  = 'Gateway Timeout';

	public const HTTP_VERSION_NOT_SUPPORTED                                       = 'HTTP Version not supported';

	public const VARIANT_ALSO_NEGOTIATES                                          = 'Variant Also Negotiates';

	public const INSUFFICIENT_STORAGE                                             = 'Insufficient Storage';

	public const LOOP_DETECTED                                                    = 'Loop Detected';

	public const BANDWIDTH_LIMIT_EXCEEDED                                         = 'Bandwidth Limit Exceeded';

	public const NOT_EXTENDED                                                     = 'Not Extended';

	public const NETWORK_AUTHENTICATION_REQUIRED                                  = 'Network Authentication Required';
}

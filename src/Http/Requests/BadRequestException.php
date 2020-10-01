<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use RuntimeException;

/**
 * Represents an exception thrown on error caused by malformed requests.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class BadRequestException extends RuntimeException
{
}

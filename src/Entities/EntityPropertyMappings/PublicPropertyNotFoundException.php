<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityPropertyMappings;

use RuntimeException;

/**
 * Represents an exception if a public property does not exist in an entity class.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class PublicPropertyNotFoundException extends RuntimeException
{
}

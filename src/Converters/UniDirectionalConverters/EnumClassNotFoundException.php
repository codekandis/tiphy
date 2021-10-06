<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\UniDirectionalConverters;

use ReflectionException;

/**
 * Represents an exception if an enum class does not exist.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class EnumClassNotFoundException extends ReflectionException
{
}

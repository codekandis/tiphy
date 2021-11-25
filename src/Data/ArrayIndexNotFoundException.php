<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Data;

use LogicException;

/**
 * Represents an exception if an array index does not exist.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ArrayIndexNotFoundException extends LogicException
{
}

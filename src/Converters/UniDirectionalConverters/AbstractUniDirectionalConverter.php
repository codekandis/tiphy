<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\UniDirectionalConverters;

use CodeKandis\Tiphy\Converters\UniDirectionalConverterInterface;

/**
 * Represents the base class of any uni-directional converter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractUniDirectionalConverter implements UniDirectionalConverterInterface
{
	/**
	 * Represents the error message if the type of a value to convert is not valid.
	 * @var string
	 */
	protected const ERROR_INVALID_VALUE_TYPE = 'The type of the value is not valid.';
}

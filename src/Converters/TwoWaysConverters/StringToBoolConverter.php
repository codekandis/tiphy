<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\TwoWaysConverters;

use CodeKandis\Tiphy\Converters\TwoWaysConverterInterface;

/**
 * Represents a two ways converter converting between string and bool.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToBoolConverter implements TwoWaysConverterInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function convertTo( $value )
	{
		return '0' === $value ? false : true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function convertFrom( $value )
	{
		return false === $value ? '0' : '1';
	}
}

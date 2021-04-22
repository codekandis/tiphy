<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_string;
use function preg_match;

/**
 * Represents a validator validating if a value is matching a regular expression.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsMatchingRegExValidator implements ValidatorInterface
{
	/**
	 * Stores the pattern to match the value.
	 * @var string
	 */
	private string $pattern;

	/**
	 * Constructor method.
	 * @param string $pattern The pattern to match the value.
	 */
	public function __construct( string $pattern )
	{
		$this->pattern = $pattern;
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_string( $value ) && 1 === preg_match( $this->pattern, $value );
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use DateTimeImmutable;
use DateTimeZone;
use function is_string;

/**
 * Represents a bi-directional converter converting between DateTimeImmutable and string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class DateTimeImmutableToStringBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Stores the format of the timestamp string.
	 * @var string
	 */
	private string $format;

	/**
	 * Stores the time zone of the timestamp.
	 * @var ?DateTimeZone
	 */
	private ?DateTimeZone $timeZone;

	/**
	 * Constructor method.
	 * @param string $format The format of the timestamp string.
	 * @param ?DateTimeZone $timeZone The time zone of the timestamp.
	 */
	public function __construct( string $format, ?DateTimeZone $timeZone = null )
	{
		$this->format   = $format;
		$this->timeZone = $timeZone;
	}

	/**
	 * Converts from a DateTimeImmutable into a string value.
	 * @param DateTimeImmutable $value The DateTimeImmutable value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertTo( $value )
	{
		if ( false === $value instanceof DateTimeImmutable )
		{
			throw $this->getInvalidTypeException( $value, 'DateTimeImmutable' );
		}

		/**
		 * @var DateTimeImmutable $value
		 */
		return $value->format( $this->format );
	}

	/**
	 * Converts from a string into a DateTimeImmutable value.
	 * @param string $value The string value which has to be converted.
	 * @return DateTimeImmutable The converted DateTimeImmutable value.
	 */
	public function convertFrom( $value )
	{
		if ( false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, 'string' );
		}

		return DateTimeImmutable::createFromFormat( $this->format, $value, $this->timeZone );
	}
}

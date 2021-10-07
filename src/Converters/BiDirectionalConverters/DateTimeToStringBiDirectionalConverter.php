<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use CodeKandis\Tiphy\Converters\InvalidValueTypeException;
use DateTime;
use DateTimeZone;
use function is_string;

/**
 * Represents a bi-directional converter converting between DateTime and string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class DateTimeToStringBiDirectionalConverter extends AbstractBiDirectionalConverter
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
	 * Converts from a DateTime into a string value.
	 * @param DateTime $value The DateTime value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertTo( $value )
	{
		if ( false === $value instanceof DateTime )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		/**
		 * @var DateTime $value
		 */
		return $value->format( $this->format );
	}

	/**
	 * Converts from a string into a DateTime value.
	 * @param string $value The string value which has to be converted.
	 * @return DateTime The converted DateTime value.
	 */
	public function convertFrom( $value )
	{
		if ( false === is_string( $value ) )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		return DateTime::createFromFormat( $this->format, $value, $this->timeZone );
	}
}

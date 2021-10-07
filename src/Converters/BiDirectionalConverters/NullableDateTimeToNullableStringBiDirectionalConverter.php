<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use DateTime;
use DateTimeZone;
use function is_string;

/**
 * Represents a bi-directional converter converting between nullable DateTime and nullable string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NullableDateTimeToNullableStringBiDirectionalConverter extends AbstractBiDirectionalConverter
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
	 * Converts from a nullable DateTime into a nullable string value.
	 * @param ?DateTime $value The nullable DateTime value which has to be converted.
	 * @return ?string The converted nullable string value.
	 */
	public function convertTo( $value )
	{
		if ( null !== $value && false === $value instanceof DateTime )
		{
			throw $this->getInvalidTypeException( $value, '?DateTime' );
		}

		/**
		 * @var ?DateTime $value
		 */
		return null === $value
			? null
			: $value->format( $this->format );
	}

	/**
	 * Converts from a nullable string into a nullable DateTime value.
	 * @param ?string $value The nullable string value which has to be converted.
	 * @return ?DateTime The converted nullable DateTime value.
	 */
	public function convertFrom( $value )
	{
		if ( null !== $value && false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, '?string' );
		}

		return null === $value
			? null
			: DateTime::createFromFormat( $this->format, $value, $this->timeZone );
	}
}

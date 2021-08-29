<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\TwoWaysConverters;

use CodeKandis\Tiphy\Converters\TwoWaysConverterInterface;
use DateTime;
use DateTimeZone;

/**
 * Represents a two ways converter converting between string and DateTime.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToDateTimeConverter implements TwoWaysConverterInterface
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
	 * Converts from a string into a DateTime value.
	 * @param string $value The string value which has to be converted.
	 * @return DateTime The converted DateTime value.
	 */
	public function convertTo( $value )
	{
		return DateTime::createFromFormat( $this->format, $value, $this->timeZone );
	}

	/**
	 * Converts from a DateTime into a string value.
	 * @param DateTime $value The DateTime value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		/**
		 * @var DateTime $value
		 */
		return $value->format( $this->format );
	}
}

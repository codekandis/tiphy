<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

/**
 * Represents the default error information implementation.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ErrorInformation implements ErrorInformationInterface
{
	/**
	 * Stores the code of the error.
	 * @var int
	 */
	public int $code;

	/**
	 * Stores the message of the error.
	 * @var string
	 */
	public string $message;

	/**
	 * Stores the context of the error.
	 * @var mixed
	 */
	public $data;

	/**
	 * Constructor method.
	 * @param int $code The code of the error.
	 * @param string $message The message of the error.
	 * @param null $data The context of the error.
	 */
	public function __construct( int $code, string $message, $data = null )
	{
		$this->code    = $code;
		$this->message = $message;
		$this->data    = $data;
	}

	/**
	 * @inheritDoc
	 */
	public function toArray(): array
	{
		$transformedArray    = [];
		$reflectedProperties = ( new ReflectionClass( static::class ) )
			->getProperties( ReflectionProperty::IS_PUBLIC );
		foreach ( $reflectedProperties as $reflectedProperty )
		{
			$reflectedPropertyName                      = $reflectedProperty->getName();
			$reflectedPropertyValue                     = $reflectedProperty->getValue( $this );
			$transformedArray[ $reflectedPropertyName ] = $reflectedPropertyValue;
		}

		return $transformedArray;
	}

	/**
	 * Prepeares the data to serialize.
	 * @return array The data to serialize.
	 * @throws ReflectionException An error occurred during the conversion.
	 */
	public function jsonSerialize(): array
	{
		return $this->toArray();
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

class ErrorInformation implements ErrorInformationInterface
{
	/** @var int */
	public $code = 0;

	/** @var string */
	public $message = '';

	/** @var mixed */
	public $data;

	public function __construct( int $code, string $message, $data = null )
	{
		$this->code    = $code;
		$this->message = $message;
		$this->data    = $data;
	}

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
	 * @throws ReflectionException
	 */
	public function jsonSerialize(): array
	{
		return $this->toArray();
	}
}

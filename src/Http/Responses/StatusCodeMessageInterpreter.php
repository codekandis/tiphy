<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use ReflectionClass;
use ReflectionException;

class StatusCodeMessageInterpreter implements StatusCodeMessageInterpreterInterface
{
	/** @var ReflectionClass */
	private $reflectedStatusCodeClass;

	/** @var ReflectionClass */
	private $reflectedStatusMessageClass;

	/**
	 * @throws ReflectionException
	 */
	public function __construct()
	{
		$this->initReflectedClasses();
	}

	/**
	 * @throws ReflectionException
	 */
	private function initReflectedClasses(): void
	{
		$this->reflectedStatusCodeClass    = new ReflectionClass( StatusCodes::class );
		$this->reflectedStatusMessageClass = new ReflectionClass( StatusMessages::class );
	}

	public function interpret( int $statusCode ): string
	{
		$interpretedMessage           = '';
		$reflectedStatusCodeConstants = $this->reflectedStatusCodeClass->getConstants();
		foreach ( $reflectedStatusCodeConstants as $reflectedStatusCodeConstantName => $reflectedStatusCodeConstantValue )
		{
			if ( $reflectedStatusCodeConstantValue === $statusCode )
			{
				$interpretedMessage =
					$this->reflectedStatusMessageClass->getConstant( $reflectedStatusCodeConstantName );
			}
		}

		return $interpretedMessage;
	}
}

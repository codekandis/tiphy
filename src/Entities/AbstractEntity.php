<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

use ReflectionClass;
use ReflectionObject;
use ReflectionProperty;

/**
 * Represents the base class of all entities.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractEntity implements EntityInterface
{
	/**
	 * {@inheritdoc}
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
	 * {@inheritdoc}
	 */
	public static function fromArray( array $data ): EntityInterface
	{
		$entity               = new static();
		$reflectedEntityClass = new ReflectionClass( $entity );
		foreach ( $data as $dataName => $dataValue )
		{
			$hasProperty = $reflectedEntityClass->hasProperty( $dataName );
			if ( false === $hasProperty )
			{
				continue;
			}
			$reflectedEntityProperty = $reflectedEntityClass->getProperty( $dataName );
			$isPublic                = $reflectedEntityProperty->isPublic();
			$isStatic                = $reflectedEntityProperty->isStatic();
			if ( true === $isStatic || false === $isPublic )
			{
				continue;
			}
			$reflectedEntityProperty->setValue( $entity, $dataValue );
		}

		return $entity;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function fromObject( object $data ): EntityInterface
	{
		$entity                  = new static();
		$reflectedEntityClass    = new ReflectionClass( $entity );
		$reflectedDataProperties = ( new ReflectionObject( $data ) )
			->getProperties( ReflectionProperty::IS_PUBLIC );
		foreach ( $reflectedDataProperties as $reflectedDataProperty )
		{
			$dataName    = $reflectedDataProperty->getName();
			$hasProperty = $reflectedEntityClass->hasProperty( $dataName );
			if ( false === $hasProperty )
			{
				continue;
			}
			$reflectedEntityProperty = $reflectedEntityClass->getProperty( $dataName );
			$isPublic                = $reflectedEntityProperty->isPublic();
			$isStatic                = $reflectedEntityProperty->isStatic();
			if ( true === $isStatic || false === $isPublic )
			{
				continue;
			}
			$dataValue = $reflectedDataProperty->getValue( $data );
			$reflectedEntityProperty->setValue( $entity, $dataValue );
		}

		return $entity;
	}

	/**
	 * {@inheritdoc}
	 */
	public function jsonSerialize(): array
	{
		return $this->toArray();
	}
}

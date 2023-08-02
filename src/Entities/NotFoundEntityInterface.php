<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

use CodeKandis\Entities\EntityInterface;

/**
 * Represents the interface of any `404 Not Found` entity.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface NotFoundEntityInterface extends EntityInterface
{
	/**
	 * Gets the method of the request.
	 * @return string The method of the request.
	 */
	public function getMethod(): string;

	/**
	 * Sets the method of the request.
	 * @param string $method The method of the request.
	 */
	public function setMethod( string $method ): void;

	/**
	 * Gets the URI of the request.
	 * @return string The URI of the request.
	 */
	public function getUri(): string;

	/**
	 * Sets the URI of the request.
	 * @param string $uri The URI of the request.
	 */
	public function setUri( string $uri ): void;
}

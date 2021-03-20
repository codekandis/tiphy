<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

/**
 * Represents the interface of all `404 Not Found` entities.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface NotFoundEntityInterface
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

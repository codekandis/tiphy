<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

/**
 * Represents the entity if an URI does not exist.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NotFoundEntity extends AbstractEntity
{
	/**
	 * Stores the method of the request.
	 * @var string
	 */
	public string $method = '';

	/**
	 * Stores the URI of the request.
	 * @var string
	 */
	public string $uri = '';
}

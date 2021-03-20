<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

/**
 * Represents a `404 Not Found` entity.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NotFoundEntity extends AbstractEntity implements NotFoundEntityInterface
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

	/**
	 * {@inheritDoc}
	 */
	public function getMethod(): string
	{
		return $this->method;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setMethod( string $method ): void
	{
		$this->method = $method;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUri(): string
	{
		return $this->uri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUri( string $uri ): void
	{
		$this->uri = $uri;
	}
}

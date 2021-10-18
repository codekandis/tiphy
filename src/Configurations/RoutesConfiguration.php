<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

/**
 * Represents a routes configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getBaseRoute(): string
	{
		return $this->data[ 'baseRoute' ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getRoutes(): array
	{
		return $this->data[ 'routes' ];
	}
}

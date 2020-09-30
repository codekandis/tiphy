<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

/**
 * Represents a routes configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RoutesConfiguration extends AbstractConfiguration implements RoutesConfigurationInterface
{
	/**
	 * @inheritDoc
	 */
	public function getRoutes(): array
	{
		return $this->data;
	}
}

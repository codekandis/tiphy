<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

use CodeKandis\Configurations\ConfigurationInterface;

/**
 * Represents the interface of any URI builder configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UriBuilderConfigurationInterface extends ConfigurationInterface
{
	/**
	 * Gets the schema of the URIs.
	 * @return string The schema of the URIs.
	 */
	public function getSchema(): string;

	/**
	 * Gets the host of the URIs.
	 * @return string The host of the URIs.
	 */
	public function getHost(): string;

	/**
	 * Gets the base URI of the URIs.
	 * @return string The base URI of the URIs.
	 */
	public function getBaseUri(): string;

	/**
	 * Gets the known relative URIs.
	 * @return string[] The known relative URIs.
	 */
	public function getRelativeUris(): array;
}

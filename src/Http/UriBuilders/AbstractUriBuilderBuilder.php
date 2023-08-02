<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\UriBuilderConfigurationInterface;

/**
 * Represents the base class of any URI builder builder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractUriBuilderBuilder implements UriBuilderBuilderInterface
{
	/**
	 * Stores the URI builder configuration.
	 * @var UriBuilderConfigurationInterface
	 */
	protected UriBuilderConfigurationInterface $uriBuilderConfiguration;

	/**
	 * Constructor method.
	 * @param UriBuilderConfigurationInterface $uriBuilderConfiguration The URI builder configuration.
	 */
	public function __construct( UriBuilderConfigurationInterface $uriBuilderConfiguration )
	{
		$this->uriBuilderConfiguration = $uriBuilderConfiguration;
	}
}

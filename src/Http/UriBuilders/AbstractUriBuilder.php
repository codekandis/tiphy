<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\UriBuilderPresetConfigurationInterface;
use function sprintf;

/**
 * Represents the base class of any URI builder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractUriBuilder implements UriBuilderInterface
{
	/**
	 * Stores the URI builder preset configuration.
	 * @var UriBuilderPresetConfigurationInterface
	 */
	private UriBuilderPresetConfigurationInterface $configuration;

	/**
	 * Constructor method.
	 * @param UriBuilderPresetConfigurationInterface $configuration The URI builder preset configuration.
	 */
	public function __construct( UriBuilderPresetConfigurationInterface $configuration )
	{
		$this->configuration = $configuration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function build( string $uriName, string ...$arguments ): string
	{
		$schema       = $this->configuration->getSchema();
		$host         = $this->configuration->getHost();
		$baseUri      = $this->configuration->getBaseUri();
		$relativeUris = $this->configuration->getRelativeUris();

		$uriPrepared = sprintf(
			'%s://%s%s%s',
			$schema,
			$host,
			$baseUri,
			$relativeUris[ $uriName ]
		);

		return sprintf( $uriPrepared, ...$arguments );
	}
}

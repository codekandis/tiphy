<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\UriBuilderConfigurationInterface;
use function sprintf;

/**
 * Represents the base class of all URI builders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractUriBuilder implements UriBuilderInterface
{
	/**
	 * Stores the configuration of the URI builder.
	 * @var UriBuilderConfigurationInterface
	 */
	private UriBuilderConfigurationInterface $configuration;

	/**
	 * Constructor method.
	 * @param UriBuilderConfigurationInterface $configuration The configuration of the URI builder.
	 */
	public function __construct( UriBuilderConfigurationInterface $configuration )
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

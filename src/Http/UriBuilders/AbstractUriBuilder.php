<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

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
	private UriBuilderConfigurationInterface $config;

	/**
	 * Constructor method.
	 * @param UriBuilderConfigurationInterface $config The configuration of the URI builder.
	 */
	public function __construct( UriBuilderConfigurationInterface $config )
	{
		$this->config = $config;
	}

	/**
	 * @inheritDoc
	 */
	public function build( string $uriName, string ...$arguments ): string
	{
		$schema       = $this->config->getSchema();
		$host         = $this->config->getHost();
		$baseUri      = $this->config->getBaseUri();
		$relativeUris = $this->config->getRelativeUris();

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

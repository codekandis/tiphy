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
	 * Stores the URI builder configuration.
	 * @var UriBuilderConfigurationInterface
	 */
	private $config;

	/**
	 * Constructor method.
	 * @param UriBuilderConfigurationInterface $config The URI builder configuration.
	 */
	public function __construct( UriBuilderConfigurationInterface $config )
	{
		$this->config = $config;
	}

	/**
	 * {@inheritdoc}
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

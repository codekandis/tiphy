<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use function sprintf;

abstract class AbstractUriBuilder implements UriBuilderInterface
{
	/** @var UriBuilderConfigurationInterface */
	private $config;

	public function __construct( UriBuilderConfigurationInterface $config )
	{
		$this->config = $config;
	}

	public function getUri( string $uriName, string ...$arguments ): string
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

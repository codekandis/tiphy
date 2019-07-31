<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use function sprintf;

abstract class UriBuilderAbstract implements UriBuilderInterface
{
	/** @var UriBuilderConfigurationInterface */
	private $config;

	/** @var string */
	private $section;

	public function __construct( UriBuilderConfigurationInterface $config, string $section )
	{
		$this->config  = $config;
		$this->section = $section;
	}

	public function getUri( string $uriName, string ...$arguments ): string
	{
		$schema       = $this->config->getSchema( $this->section );
		$host         = $this->config->getHost( $this->section );
		$baseUri      = $this->config->getBaseUri( $this->section );
		$relativeUris = $this->config->getRelativeUris( $this->section );

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

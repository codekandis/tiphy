<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class UriBuilderConfiguration extends AbstractConfiguration implements UriBuilderConfigurationInterface
{
	public function __construct( string $path )
	{
		parent::__construct( $path );
	}

	public function getSchema(): string
	{
		return $this->data[ 'schema' ];
	}

	public function getHost(): string
	{
		return $this->data[ 'host' ];
	}

	public function getBaseUri(): string
	{
		return $this->data[ 'baseUri' ];
	}

	public function getRelativeUris(): array
	{
		return $this->data[ 'relativeUris' ];
	}
}

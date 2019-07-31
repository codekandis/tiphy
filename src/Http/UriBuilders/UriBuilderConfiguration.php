<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class UriBuilderConfiguration extends AbstractConfiguration implements UriBuilderConfigurationInterface
{
	public function __construct( string $path )
	{
		parent::__construct( $path );
	}

	public function getSchema( string $section ): string
	{
		return $this->data[ $section ][ 'schema' ];
	}

	public function getHost( string $section ): string
	{
		return $this->data[ $section ][ 'host' ];
	}

	public function getBaseUri( string $section ): string
	{
		return $this->data[ $section ][ 'baseUri' ];
	}

	public function getRelativeUris( string $section ): array
	{
		return $this->data[ $section ][ 'relativeUris' ];
	}
}

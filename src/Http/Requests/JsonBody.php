<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use function file_get_contents;
use function json_decode;

class JsonBody implements JsonBodyInterface
{
	/**
	 * @throws BadRequestException
	 */
	public function getContent()
	{
		$content     = file_get_contents( 'php://input' );
		$jsonContent = json_decode( $content );
		if ( null === $jsonContent )
		{
			throw new BadRequestException( 'JSON data is missing.' );
		}

		return $jsonContent;
	}
}

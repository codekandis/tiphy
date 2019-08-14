<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use CodeKandis\JsonCodec\JsonDecoder;
use JsonException;
use function file_get_contents;

class JsonBody implements JsonBodyInterface
{
	/**
	 * @throws BadRequestException
	 */
	public function getContent()
	{
		$content = file_get_contents( 'php://input' );
		try
		{
			$jsonContent = ( new JsonDecoder() )
				->decode( $content );
		}
		catch ( JsonException $exception )
		{
			throw new BadRequestException( $exception->getMessage(), $exception->getCode() );
		}

		return $jsonContent;
	}
}

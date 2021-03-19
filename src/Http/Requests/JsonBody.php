<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use CodeKandis\JsonCodec\JsonDecoder;
use JsonException;
use function file_get_contents;

/**
 * Represents a JSON body.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class JsonBody implements JsonBodyInterface
{
	/**
	 * {@inheritDoc}
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

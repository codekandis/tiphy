<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use JsonException;

/**
 * Represents the default action if an unhandled error occurred during processing the request.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class InternalServerErrorAction implements ActionInterface
{
	/**
	 * @inheritDoc
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::INTERNAL_SERVER_ERROR, StatusMessages::INTERNAL_SERVER_ERROR );
		( new JsonResponder( StatusCodes::INTERNAL_SERVER_ERROR, null, $errorInformation ) )
			->respond();
	}
}

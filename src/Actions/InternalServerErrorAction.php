<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use JsonException;

class InternalServerErrorAction implements ActionInterface
{
	/**
	 * @throws JsonException
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::INTERNAL_SERVER_ERROR, StatusMessages::INTERNAL_SERVER_ERROR );
		( new JsonResponder( StatusCodes::INTERNAL_SERVER_ERROR, null, $errorInformation ) )
			->respond();
	}
}

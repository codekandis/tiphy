<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use JsonException;

class NotFoundAction implements ActionInterface
{
	/**
	 * @throws JsonException
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::NOT_FOUND, StatusMessages::NOT_FOUND );
		( new JsonResponder( StatusCodes::NOT_FOUND, null, $errorInformation ) )
			->respond();
	}
}

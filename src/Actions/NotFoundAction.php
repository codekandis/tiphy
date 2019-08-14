<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;

class NotFoundAction implements ActionInterface
{
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::NOT_FOUND, StatusMessages::NOT_FOUND );
		( new JsonResponder( StatusCodes::NOT_FOUND, null, $errorInformation ) )
			->respond();
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;

class MethodNotAllowedAction implements ActionInterface
{
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::METHOD_NOT_ALLOWED, StatusMessages::METHOD_NOT_ALLOWED );
		( new JsonResponder( StatusCodes::METHOD_NOT_ALLOWED, null, $errorInformation ) )
			->respond();
	}
}

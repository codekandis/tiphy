<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use ReflectionException;

class NotFoundAction implements ActionInterface
{
	/**
	 * @throws ReflectionException
	 */
	public function execute(): void
	{
		$response = new JsonResponder( StatusCodes::NOT_FOUND, null );
		$response->respond();
	}
}

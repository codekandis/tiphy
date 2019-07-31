<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use ReflectionException;

class MethodNotAllowedAction implements ActionInterface
{
	/**
	 * @throws ReflectionException
	 */
	public function execute(): void
	{
		$response = new JsonResponder( StatusCodes::METHOD_NOT_ALLOWED, null );
		$response->respond();
	}
}

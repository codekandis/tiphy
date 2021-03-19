<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use JsonException;

/**
 * Represents the default action if a requested HTTP method is not allowed.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class MethodNotAllowedAction implements ActionInterface
{
	/**
	 * {@inheritDoc}
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::METHOD_NOT_ALLOWED, StatusMessages::METHOD_NOT_ALLOWED );
		( new JsonResponder( StatusCodes::METHOD_NOT_ALLOWED, null, $errorInformation ) )
			->respond();
	}
}

<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Http\Responses\StatusMessages;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use JsonException;

/**
 * Represents the default action if a requested URI cannot be resolved.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NotFoundAction implements ActionInterface
{
	/**
	 * {@inheritdoc}
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function execute(): void
	{
		$errorInformation = new ErrorInformation( StatusCodes::NOT_FOUND, StatusMessages::NOT_FOUND );
		( new JsonResponder( StatusCodes::NOT_FOUND, null, $errorInformation ) )
			->respond();
	}
}

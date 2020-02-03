<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables\Handlers;

use CodeKandis\Tiphy\Actions\InternalServerErrorAction;
use JsonException;
use Throwable;

/**
 * Represents a throwable handler executing the internal server error action.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class InternalServerErrorThrowableHandler implements ThrowableHandlerInterface
{
	/**
	 * Executes the throwable handler and executes the default action to handle unhandled errors.
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function execute( Throwable $throwable ): void
	{
		( new InternalServerErrorAction() )
			->execute();
	}
}

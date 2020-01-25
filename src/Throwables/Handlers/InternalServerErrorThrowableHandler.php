<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables\Handlers;

use CodeKandis\Tiphy\Actions\InternalServerErrorAction;
use JsonException;
use Throwable;

class InternalServerErrorThrowableHandler implements ThrowableHandlerInterface
{
	/**
	 * @throws JsonException
	 */
	public function execute( Throwable $throwable ): void
	{
		( new InternalServerErrorAction() )
			->execute();
	}
}

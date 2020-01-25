<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables\Handlers;

use Throwable;

interface ThrowableHandlerInterface
{
	public function execute( Throwable $throwable ): void;
}

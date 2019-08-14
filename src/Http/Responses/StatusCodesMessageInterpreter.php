<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;

class StatusCodesMessageInterpreter extends CodeMessageInterpreter
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct( StatusCodes::class, StatusMessages::class );
	}
}

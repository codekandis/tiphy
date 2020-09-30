<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;

/**
 * Represents a HTTP response status code interpreter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
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

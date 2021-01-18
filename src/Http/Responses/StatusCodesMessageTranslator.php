<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;

/**
 * Represents a HTTP response status code translator.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StatusCodesMessageTranslator extends ConstantsClassesTranslator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct( StatusCodes::class, StatusMessages::class );
	}
}

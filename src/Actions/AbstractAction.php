<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Requests\JsonBodyInterface;

/**
 * Represents the base class of all actions.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractAction implements ActionInterface
{
	/**
	 * Stores the request body.
	 * @var JsonBodyInterface
	 */
	protected $requestBody;

	/**
	 * Stores the arguments of the request.
	 * @var array
	 */
	protected $arguments;

	/**
	 * Constructor method.
	 * @param JsonBodyInterface $requestBody The request body.
	 * @param array $arguments The arguments of the request.
	 */
	public function __construct( JsonBodyInterface $requestBody, array $arguments )
	{
		$this->requestBody = $requestBody;
		$this->arguments   = $arguments;
	}
}

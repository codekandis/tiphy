<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Requests\JsonBodyInterface;

/**
 * Represents the base class of any action.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractAction implements ActionInterface
{
	/**
	 * Stores the requested route.
	 * @var string
	 */
	protected string $requestedRoute;

	/**
	 * Stores the request body.
	 * @var JsonBodyInterface
	 */
	protected JsonBodyInterface $requestBody;

	/**
	 * Stores the arguments of the request.
	 * @var array
	 */
	protected array $arguments;

	/**
	 * Constructor method.
	 * @param string $requestedRoute The requested route.
	 * @param JsonBodyInterface $requestBody The request body.
	 * @param array $arguments The arguments of the request.
	 */
	public function __construct( string $requestedRoute, JsonBodyInterface $requestBody, array $arguments )
	{
		$this->requestedRoute = $requestedRoute;
		$this->requestBody    = $requestBody;
		$this->arguments      = $arguments;
	}
}

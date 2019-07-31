<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

use CodeKandis\Tiphy\Http\Requests\JsonBodyInterface;

abstract class ActionAbstract implements ActionInterface
{
	/** @var JsonBodyInterface */
	protected $requestBody;

	/** @var array */
	protected $arguments;

	public function __construct( JsonBodyInterface $requestBody, array $arguments )
	{
		$this->requestBody = $requestBody;
		$this->arguments   = $arguments;
	}
}

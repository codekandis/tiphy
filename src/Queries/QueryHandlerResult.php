<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Queries;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;

/**
 * Represents a query handler result.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class QueryHandlerResult implements QueryHandlerResultInterface
{
	/**
	 * Stores the state of the query handler result.
	 * @var bool
	 */
	private bool $state;

	/**
	 * Stores the errors if the query handler failed to execute.
	 * @var ErrorInformationInterface[]
	 */
	private array $errors;

	/**
	 * Constructor method.
	 * @param bool $state The state of the query handler result.
	 * @param ErrorInformationInterface[] $errors the errors if the query handler failed to execute.
	 */
	public function __construct( bool $state, array $errors = [] )
	{
		$this->state  = $state;
		$this->errors = $errors;
	}

	/**
	 * @inheritDoc
	 */
	public function getState(): bool
	{
		return $this->state;
	}

	/**
	 * @inheritDoc
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}
}

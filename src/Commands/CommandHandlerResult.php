<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Commands;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;

/**
 * Represents a command handler result.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class CommandHandlerResult implements CommandHandlerResultInterface
{
	/**
	 * Stores the state of the command handler result.
	 * @var bool
	 */
	private bool $state;

	/**
	 * Stores the errors if the command handler failed to execute.
	 * @var ErrorInformationInterface[]
	 */
	private array $errors;

	/**
	 * Constructor method.
	 * @param bool $state The state of the command handler result.
	 * @param ErrorInformationInterface[] $errors the errors if the command handler failed to execute.
	 */
	public function __construct( bool $state, array $errors = [] )
	{
		$this->state  = $state;
		$this->errors = $errors;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getState(): bool
	{
		return $this->state;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}
}

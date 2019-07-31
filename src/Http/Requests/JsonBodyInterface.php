<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

interface JsonBodyInterface
{
	/**
	 * @return mixed
	 * @throws BadRequestException
	 */
	public function getContent();
}

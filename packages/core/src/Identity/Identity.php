<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Identity;

use Nette\Security\IIdentity;

class Identity implements IIdentity
{

	/** @var string */
	private $id;

	/** @var array */
	private $roles;

	public function __construct(string $id, array $roles)
	{
		$this->id = $id;
		$this->roles = $roles;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getRoles(): array
	{
		return $this->roles;
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account;

use Modette\Accounts\Core\Account\Mapper\AccountMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class AccountRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Account::class,
		];
	}

	public function __construct(AccountMapper $mapper, ?IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

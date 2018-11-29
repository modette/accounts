<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account\Mapper;

use Nextras\Orm\Mapper\Dbal\StorageReflection\UnderscoredStorageReflection;
use Nextras\Orm\Mapper\Mapper;

class AccountPgsqlMapper extends Mapper implements AccountMapper
{

	public function getTableName(): string
	{
		return 'modette_accounts.accounts';
	}

	protected function createStorageReflection(): UnderscoredStorageReflection
	{
		$reflection = parent::createStorageReflection();
		$reflection->setMapping('person', 'person_id');
		return $reflection;
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person\Mapper;

use Nextras\Orm\Mapper\Dbal\StorageReflection\UnderscoredStorageReflection;
use Nextras\Orm\Mapper\Mapper;

class PersonPgsqlMapper extends Mapper implements PersonMapper
{

	public function getTableName(): string
	{
		return 'modette_accounts.persons';
	}

	protected function createStorageReflection(): UnderscoredStorageReflection
	{
		$reflection = parent::createStorageReflection();
		$reflection->setMapping('account', 'account_id');
		return $reflection;
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person\Mapper;

use Nextras\Orm\Mapper\Dbal\StorageReflection\UnderscoredStorageReflection;
use Nextras\Orm\Mapper\Mapper;

class PersonAttributePgsqlMapper extends Mapper implements PersonAttributeMapper
{

	public function getTableName(): string
	{
		return 'modette_accounts.person_attributes';
	}

	protected function createStorageReflection(): UnderscoredStorageReflection
	{
		$reflection = parent::createStorageReflection();
		$reflection->setMapping('person', 'person_id');
		return $reflection;
	}

}

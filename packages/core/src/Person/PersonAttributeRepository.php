<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person;

use Modette\Accounts\Core\Person\Mapper\PersonAttributeMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class PersonAttributeRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			PersonAttribute::class,
		];
	}

	public function __construct(PersonAttributeMapper $mapper, ?IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

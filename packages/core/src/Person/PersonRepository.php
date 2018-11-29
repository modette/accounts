<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person;

use Modette\Accounts\Core\Person\Mapper\PersonMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class PersonRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Person::class,
		];
	}

	public function __construct(PersonMapper $mapper, ?IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

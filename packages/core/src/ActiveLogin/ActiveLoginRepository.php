<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\ActiveLogin;

use Modette\Accounts\Core\ActiveLogin\Mapper\ActiveLoginMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class ActiveLoginRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			ActiveLogin::class,
		];
	}

	public function __construct(ActiveLoginMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

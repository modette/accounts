<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Scope;

use Modette\Accounts\Core\Scope\Mapper\ScopeMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class ScopeRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Scope::class,
		];
	}

	public function __construct(ScopeMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

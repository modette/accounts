<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\KeySet;

use Modette\Accounts\Core\KeySet\Mapper\KeySetMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class KeySetRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			KeySet::class,
		];
	}

	public function __construct(KeySetMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

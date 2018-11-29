<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Scope;

use Modette\Orm\Properties\CreatedAt;
use Modette\Orm\Properties\UpdatedAt;
use Modette\Orm\Properties\UUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property mixed[] $permissions Contains array of roles and privileges (null means all) {default []}
 */
class Scope extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Scope;

use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\UpdatedAt;
use Modette\Orm\Property\PrimaryUUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property mixed[] $permissions Contains array of roles and privileges (null means all) {default []}
 */
class Scope extends Entity
{

	use PrimaryUUID;
	use CreatedAt;
	use UpdatedAt;

}

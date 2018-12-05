<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\KeySet;

use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\UpdatedAt;
use Modette\Orm\Property\PrimaryUUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property string[] $keys
 */
class KeySet extends Entity
{

	use PrimaryUUID;
	use CreatedAt;
	use UpdatedAt;

	public function hasKey(string $key): bool
	{
		return array_key_exists($key, $this->keys);
	}

	public function getKey(string $key): string
	{
		return $this->keys[$key];
	}

}

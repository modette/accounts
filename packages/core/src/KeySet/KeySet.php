<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\KeySet;

use Modette\Orm\Properties\CreatedAt;
use Modette\Orm\Properties\UpdatedAt;
use Modette\Orm\Properties\UUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property string[] $keys
 */
class KeySet extends Entity
{

	use UUID;
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

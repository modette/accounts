<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person;

use Modette\Orm\Properties\CreatedAt;
use Modette\Orm\Properties\UpdatedAt;
use Modette\Orm\Properties\UUID;
use Nextras\Orm\Entity\Entity;

/**
 * @todo - remove Person? one sided relationship should be enough
 * @todo - group?
 * @property-read Person $person {m:1 Person::$attributes}
 * @property-read string $name
 * @property      string $value
 */
class PersonAttribute extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(Person $person, string $name, string $value)
	{
		parent::__construct();
		$this->setReadOnlyValue('person', $person);
		$this->setReadOnlyValue('name', $name);
		$this->value = $value;
	}

}

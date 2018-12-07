<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person;

use Modette\Accounts\Core\Account\Account;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\UUID;
use Modette\Orm\Property\UpdatedAt;
use Nette\Utils\Strings;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\OneHasMany;

/**
 * @property Account|null                 $account    {1:1 Account::$person, cascade=[persist, remove]} {default null}
 * @property string                       $url
 * @property string                       $firstName
 * @property string                       $lastName
 * @property OneHasMany&PersonAttribute[] $attributes {1:m PersonAttribute::$person, cascade=[persist, remove]}
 */
class Person extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(string $firstName, string $lastName, string $url)
	{
		parent::__construct();
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->url = $url;
	}

	protected function setterUrl(string $url): string
	{
		return Strings::webalize($url);
	}

	protected function setterFirstName(string $firstName): string
	{
		return ucwords(strtolower($firstName));
	}

	protected function setterLastName(string $lastName): string
	{
		return ucwords(strtolower($lastName));
	}

}

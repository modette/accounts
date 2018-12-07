<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account;

use Contributte\Model\Values\Email;
use Modette\Accounts\Core\KeySet\KeySet;
use Modette\Accounts\Core\Person\Person;
use Modette\Accounts\Core\Scope\Scope;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\UpdatedAt;
use Modette\Orm\Property\UUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property-read Person       $person      {1:1 Person::$account, isMain = true}
 * @property      AccountState $state
 * @property      bool         $isAdmin
 * @property-read Scope        $adminScope  {1:1 Scope, isMain = true, oneSided = true}
 * @property-read Scope        $frontScope  {1:1 Scope, isMain = true, oneSided = true}
 * @property-read KeySet       $keySet      {1:1 Scope, isMain = true, oneSided = true}
 * @property      Email        $email
 * @todo - všude nastavit cascade
 * @todo - ApiAccount (ApiAccess?)
 * @todo - Group?
 * @todo - last known timezone
 *       - detekuje se při registraci a při změně ip adresy?
 *       - nebo home timezone?
 * @todo - jazyk
 *         - uložit při registraci
 */
class Account extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(Person $person, Email $email, KeySet $keySet)
	{
		parent::__construct();
		$this->setReadOnlyValue('person', $person);
		$this->state = AccountState::NEW();
		$this->isAdmin = false;
		$this->adminScope = new Scope();
		$this->frontScope = new Scope();
		$this->email = $email;
		$this->keySet = $keySet;
	}

}

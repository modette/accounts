<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\ActiveLogin;

use Modette\Accounts\Core\Account\Account;
use Modette\Orm\Properties\CreatedAt;
use Modette\Orm\Properties\UpdatedAt;
use Modette\Orm\Properties\UUID;
use Nextras\Orm\Entity\Entity;

/**
 * @property-read Account $account
 * @property      string  $ipAddress
 * @property      string  $userAgent
 * @todo - value object IpAddress a UserAgent
 * @todo - vytváří se automaticky pro přihlášeného uživatele při každém přístupu (při kterém aktivní login ještě nemá)
 *       - pokud se během session změní user agent nebo ip adresa, tak se konkrétní instance active login aktualizuje, nevytváří se nová
 */
class ActiveLogin extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(Account $account, string $ipAddress, string $userAgent)
	{
		parent::__construct();
		$this->account = $account;
		$this->ipAddress = $ipAddress;
		$this->userAgent = $userAgent;
	}

}

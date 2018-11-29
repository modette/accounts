<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account\Event;

use Modette\Accounts\Core\Account\Account;
use Symfony\Component\EventDispatcher\Event;

class RemoveAccountEvent extends Event
{

	public const NAME = 'modette.accounts.core.account.remove';

	/** @var Account */
	private $account;

	public function __construct(Account $account)
	{
		$this->account = $account;
	}

	public function getAccount(): Account
	{
		return $this->account;
	}

}

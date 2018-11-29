<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account;

use Modette\Accounts\Core\Account\Event\CreateAccountEvent;
use Modette\Accounts\Core\Account\Event\RemoveAccountEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AccountFacade
{

	/** @var AccountRepository */
	private $accountRepository;

	/** @var EventDispatcherInterface */
	private $eventDispatcher;

	public function __construct(AccountRepository $accountRepository, EventDispatcherInterface $eventDispatcher)
	{
		$this->accountRepository = $accountRepository;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function getAccountRepository(): AccountRepository
	{
		return $this->accountRepository;
	}

	public function createAccount(Account $account): Account
	{
		$this->accountRepository->persistAndFlush($account);

		$this->eventDispatcher->dispatch(CreateAccountEvent::NAME, new CreateAccountEvent($account));

		return $account;
	}

	public function removeAccount(Account $account): Account
	{
		$this->accountRepository->removeAndFlush($account);

		$this->eventDispatcher->dispatch(RemoveAccountEvent::NAME, new RemoveAccountEvent($account));

		return $account;
	}

	public function activateAccount(Account $account): Account
	{
		$account->state = AccountState::ACTIVATED();

		$this->accountRepository->persistAndFlush($account);

		return $account;
	}

	public function deactivateAccount(Account $account): Account
	{
		$account->state = AccountState::DEACTIVATED();

		$this->accountRepository->persistAndFlush($account);

		return $account;
	}

}

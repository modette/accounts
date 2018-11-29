<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token\Service;

use Modette\Accounts\Core\Account\AccountRepository;
use Modette\Accounts\Core\Token\TokenRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TokenSecurityService implements EventSubscriberInterface
{

	/** @var AccountRepository */
	private $accountRepository;

	/** @var TokenRepository */
	private $tokenRepository;

	/**
	 * @return string[]
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			//TODO - keyset change
			//TODO - scope change
			//TODO - isAdmin change
			//	   - expire account tokens after these changes
		];
	}

	public function __construct(AccountRepository $accountRepository, TokenRepository $tokenRepository)
	{
		$this->accountRepository = $accountRepository;
		$this->tokenRepository = $tokenRepository;
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account;

interface AccountFacadeAccessor
{

	public function get(): AccountFacade;

}

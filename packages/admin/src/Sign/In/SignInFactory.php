<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Sign\In;

interface SignInFactory
{

	public function create(): SignInControl;

}

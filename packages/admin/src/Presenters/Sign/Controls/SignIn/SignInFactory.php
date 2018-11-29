<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Presenters\Sign\Controls\SignIn;

interface SignInFactory
{

	public function create(): SignInControl;

}

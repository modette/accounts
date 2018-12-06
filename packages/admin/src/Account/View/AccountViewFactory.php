<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Account\View;

interface AccountViewFactory
{

	public function create(): AccountViewControl;

}

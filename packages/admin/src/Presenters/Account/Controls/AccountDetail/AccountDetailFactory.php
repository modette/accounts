<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Presenters\Account\Controls\AccountDetail;

interface AccountDetailFactory
{

	public function create(): AccountDetailControl;

}

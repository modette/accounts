<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Presenter\Account\Controls\AccountDetail;

interface AccountDetailFactory
{

	public function create(): AccountDetailControl;

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Account\Presenter;

use Modette\Admin\Presenter\Admin\BaseAdminPresenter;

class AccountPresenter extends BaseAdminPresenter
{

	public function actionView(string $id): void
	{
		// specific account
		// special case - own account?
	}

	public function actionList(int $page = 1): void
	{
		// grid
	}

}

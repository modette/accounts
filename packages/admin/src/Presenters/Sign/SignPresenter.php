<?php declare(strict_types = 1);

namespace Modette\Accounts\Admin\Presenters\Sign;

use Modette\Admin\Presenters\Admin\BaseAdminPresenter;

class SignPresenter extends BaseAdminPresenter
{

	public function actionIn(): void
	{
		// TODO: Implement actionIn() method.
	}

	public function actionOut(): void
	{
		// TODO: Implement actionOut() method.
		$this->flashSuccess('Successfully logged out');
		$this->redirect('in');
	}

	protected function beforeRender(): void
	{
		parent::beforeRender();

		$this['document-head-title']->setMain('Sign');
	}

}

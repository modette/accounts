<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account\Command;

use Modette\Accounts\Core\Account\AccountFacadeAccessor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveAccountCommand extends Command
{

	/** @var string */
	protected static $defaultName = 'modette:accounts:account:remove';

	/** @var AccountFacadeAccessor */
	private $accountFacadeAccessor;

	public function __construct(AccountFacadeAccessor $accountFacadeAccessor)
	{
		parent::__construct();
		$this->accountFacadeAccessor = $accountFacadeAccessor;
	}

	protected function configure(): void
	{
		$this->setName(static::$defaultName);
	}

	protected function execute(InputInterface $input, OutputInterface $output): void
	{
		//TODO - search user and ask if should be really removed
		$this->accountFacadeAccessor->get();
	}

}

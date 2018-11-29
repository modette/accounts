<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Scope\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ScopeUpdateService implements EventSubscriberInterface
{

	/**
	 * @return string[]
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			//TODO - update api scope after change of owner scope
		];
	}

}

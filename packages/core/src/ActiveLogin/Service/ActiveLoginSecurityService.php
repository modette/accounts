<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\ActiveLogin\Service;

use Symfony\Contracts\Service\ServiceSubscriberInterface;

class ActiveLoginSecurityService implements ServiceSubscriberInterface
{

	/**
	 * @return string[]
	 */
	public static function getSubscribedServices(): array
	{
		return [
			//TODO - remove all active logins after change of user password (only password, other keys, like email are ok)
		];
	}

}

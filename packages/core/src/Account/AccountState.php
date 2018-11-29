<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account;

use MabeEnum\Enum;

/**
 * @method static self NEW()
 * @method static self ACTIVATED()
 * @method static self DEACTIVATED()
 *
 * @method int getValue()
 */
class AccountState extends Enum
{

	public const NEW = 1;

	public const ACTIVATED = 1;

	public const DEACTIVATED = 1;

}

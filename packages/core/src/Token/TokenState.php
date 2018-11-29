<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token;

use MabeEnum\Enum;

/**
 * @method static self CREATED()
 * @method static self APPLIED()
 * @method static self EXPIRED()
 *
 * @method int getValue()
 */
class TokenState extends Enum
{

	public const CREATED = 1;

	public const APPLIED = 2;

	public const EXPIRED = 3;

}

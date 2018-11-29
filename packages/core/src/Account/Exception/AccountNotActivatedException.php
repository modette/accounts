<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Account\Exception;

use Modette\Core\Exception\Check\CheckedException;
use RuntimeException;

class AccountNotActivatedException extends RuntimeException implements CheckedException
{

}

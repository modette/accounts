<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token\Exception;

use Modette\Core\Exception\Check\CheckedException;
use RuntimeException;

class TokenNotFoundException extends RuntimeException implements CheckedException, TokenException
{

}

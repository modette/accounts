<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token;

use Modette\Accounts\Core\Token\Mapper\TokenMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class TokenRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Token::class,
		];
	}

	public function __construct(TokenMapper $mapper, ?IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token;

use DateTimeImmutable as NativeDateTimeImmutable;
use Modette\Accounts\Core\Account\Account;
use Modette\Core\Exception\Logic\InvalidStateException;
use Modette\Orm\Properties\CreatedAt;
use Modette\Orm\Properties\UpdatedAt;
use Modette\Orm\Properties\UUID;
use Nextras\Dbal\Utils\DateTimeImmutable;
use Nextras\Orm\Entity\Entity;

/**
 * @property-read Account           $account        {1:1 Account, isMain = true, oneSided = true}
 * @property-read string            $selector
 * @property-read string            $verifierHash
 * @property-read TokenState        $state
 * @property-read string            $type           @todo
 * @property-read DateTimeImmutable $expireAt
 * @property      mixed[]           $data           {default []}
 */
class Token extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public const SELECTOR_LENGTH = 32;

	/** 48 is length of sha384 - bigger makes no sense */
	public const VERIFIER_LENGTH = 48;

	/** @var string|null */
	private $value;

	public function __construct(Account $account, NativeDateTimeImmutable $expireAt)
	{
		parent::__construct();

		$selector = bin2hex(random_bytes(self::SELECTOR_LENGTH / 2));
		$verifier = bin2hex(random_bytes(self::VERIFIER_LENGTH / 2));
		$verifierHash = hash('sha384', $verifier);
		$this->value = sprintf('%s%s', $selector, $verifier);

		$this->setReadOnlyValue('account', $account);
		$this->setReadOnlyValue('selector', $selector);
		$this->setReadOnlyValue('verifierHash', $verifierHash);
		$this->setReadOnlyValue('state', TokenState::CREATED());
		$this->setReadOnlyValue('expireAt', $expireAt);
	}

	/**
	 * Get token in form in which should be presented to user.
	 * Available only in request in which was token created (it could not be stored for security reasons)
	 */
	public function getToken(): string
	{
		if ($this->value === null) {
			throw new InvalidStateException(
				'Token value could be obtained only during request in which token was created.'
			);
		}

		return $this->value;
	}

	public function isState(TokenState $state): bool
	{
		return $state->is($this->state);
	}

	public function isApplied(): bool
	{
		return $this->state->is(TokenState::APPLIED());
	}

	public function apply(): void
	{
		$this->setReadOnlyValue('state', TokenState::APPLIED());
	}

	public function isExpired(NativeDateTimeImmutable $now): bool
	{
		// Token is expired by time and by changing state manually
		return
			$this->state->is(TokenState::EXPIRED) ||
			$now > $this->expireAt;
	}

	public function expire(): void
	{
		$this->setReadOnlyValue('state', TokenState::EXPIRED());
	}

}

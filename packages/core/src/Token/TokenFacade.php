<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Token;

use DateTimeImmutable;
use Modette\Accounts\Core\Account\Account;
use Modette\Accounts\Core\Token\Exception\TokenAppliedException;
use Modette\Accounts\Core\Token\Exception\TokenExpiredException;
use Modette\Accounts\Core\Token\Exception\TokenNotFoundException;
use Nextras\Orm\Collection\ICollection;

class TokenFacade
{

	/** @var TokenRepository */
	private $tokenRepository;

	public function __construct(TokenRepository $tokenRepository)
	{
		$this->tokenRepository = $tokenRepository;
	}

	public function getTokenRepository(): TokenRepository
	{
		return $this->tokenRepository;
	}

	/**
	 * @param mixed[] $data
	 */
	public function createToken(Account $account, DateTimeImmutable $expireAt, array $data = []): Token
	{
		$token = new Token($account, $expireAt);
		$token->data = $data;

		$this->tokenRepository->persistAndFlush($token);

		return $token;
	}

	/**
	 * @throws TokenNotFoundException
	 * @throws TokenAppliedException
	 * @throws TokenExpiredException
	 */
	public function validateToken(string $value): Token
	{
		if (mb_strlen($value) !== (Token::SELECTOR_LENGTH + Token::VERIFIER_LENGTH)) {
			throw new TokenNotFoundException(); // Token have invalid format, act like it don't exist
		}

		$selector = mb_substr($value, 0, Token::SELECTOR_LENGTH);

		$token = $this->tokenRepository->getBy([
			'selector' => $selector,
		]);

		if ($token === null) {
			throw new TokenNotFoundException();
		}

		if ($token->isApplied()) {
			throw new TokenAppliedException();
		}

		if ($token->isExpired(new DateTimeImmutable('now'))) {
			throw new TokenExpiredException();
		}

		$verifier = mb_substr($value, Token::SELECTOR_LENGTH + 1);
		$verifierHash = hash('sha384', $verifier);

		if (!hash_equals($token->verifierHash, $verifierHash)) {
			throw new TokenNotFoundException(); // Token have invalid format, act like it don't exist
		}

		$token->apply();
		$this->tokenRepository->persistAndFlush($token);

		return $token;
	}

	public function expireAccountTokens(Account $account): void
	{
		$tokens = $this->tokenRepository->findBy([
			'account' => $account,
		]);

		foreach ($tokens as $token) {
			if ($token->isState(TokenState::CREATED())) {
				$token->expire();
				$this->tokenRepository->persist($token);
			}
		}
		$this->tokenRepository->flush();
	}

	/**
	 * Removes all applied and expired tokens which have expired 7 and more days ago
	 * @todo - run periodically
	 */
	public function removeInactiveTokens(): void
	{
		$tokens = $this->tokenRepository->findBy([
			ICollection:: AND,
			[
				ICollection:: OR,
				[
					'state' => TokenState::APPLIED(),
				],
				[
					'state' => TokenState::EXPIRED(),
				],
			],
			[
				'expireAt<=' => new DateTimeImmutable('-7 days'),
			],
		]);

		foreach ($tokens as $token) {
			$this->tokenRepository->remove($token);
		}
		$this->tokenRepository->flush();
	}

}

<?php declare(strict_types = 1);

namespace Modette\Accounts\Core\Person;

class PersonFacade
{

	/** @var PersonRepository */
	private $personRepository;

	public function __construct(PersonRepository $personRepository)
	{
		$this->personRepository = $personRepository;
	}

	public function getPersonRepository(): PersonRepository
	{
		return $this->personRepository;
	}

	public function createAccount(Person $person): Person
	{
		$this->personRepository->persistAndFlush($person);

		return $person;
	}

}

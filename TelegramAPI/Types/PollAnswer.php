<?php

namespace TelegramApi\Types;

class PollAnswer implements TypeInterface
{
	/** @var string Unique poll identifier */
	public string $pollId;

	/** @var User The user, who changed the answer to the poll */
	public User $user;

	/** @var Array<int> 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote. */
	public array $optionIds;
}

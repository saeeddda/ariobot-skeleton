<?php

namespace TelegramApi\Types;

class Poll implements TypeInterface
{
	/** @var string Unique poll identifier */
	public string $id;

	/** @var string Poll question, 1-300 characters */
	public string $question;

	/** @var Array<PollOption> List of poll options */
	public array $options;

	/** @var int Total number of users that voted in the poll */
	public int $totalVoterCount;

	/** @var bool True, if the poll is closed */
	public bool $isClosed;

	/** @var bool True, if the poll is anonymous */
	public bool $isAnonymous;

	/** @var string Poll type, currently can be “regular” or “quiz” */
	public string $type;

	/** @var bool True, if the poll allows multiple answers */
	public bool $allowsMultipleAnswers;

	/** @var int|null Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot. */
	public ?int $correctOptionId = null;

	/** @var string|null Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters */
	public ?string $explanation = null;

	/** @var Array<MessageEntity>|null Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation */
	public ?array $explanationEntities = null;

	/** @var int|null Optional. Amount of time in seconds the poll will be active after creation */
	public ?int $openPeriod = null;

	/** @var int|null Optional. Point in time (Unix timestamp) when the poll will be automatically closed */
	public ?int $closeDate = null;
}

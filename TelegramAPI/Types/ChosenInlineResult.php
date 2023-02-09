<?php

namespace TelegramApi\Types;

class ChosenInlineResult implements TypeInterface
{
	/** @var string The unique identifier for the result that was chosen */
	public string $resultId;

	/** @var User The user that chose the result */
	public User $from;

	/** @var Location|null Optional. Sender location, only for bots that require user location */
	public ?Location $location = null;

	/** @var string|null Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message. */
	public ?string $inlineMessageId = null;

	/** @var string The query that was used to obtain the result */
	public string $query;
}

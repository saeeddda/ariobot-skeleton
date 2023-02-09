<?php

namespace TelegramApi\Types;

class CallbackQuery implements TypeInterface
{
	/** @var string Unique identifier for this query */
	public string $id;

	/** @var User Sender */
	public User $from;

	/** @var Message|null Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old */
	public ?Message $message = null;

	/** @var string|null Optional. Identifier of the message sent via the bot in inline mode, that originated the query. */
	public ?string $inlineMessageId = null;

	/** @var string Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games. */
	public string $chatInstance;

	/** @var string|null Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data. */
	public ?string $data = null;

	/** @var string|null Optional. Short name of a Game to be returned, serves as the unique identifier for the game */
	public ?string $gameShortName = null;
}

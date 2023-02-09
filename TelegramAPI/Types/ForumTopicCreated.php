<?php

namespace TelegramApi\Types;

class ForumTopicCreated implements TypeInterface
{
	/** @var string Name of the topic */
	public string $name;

	/** @var int Color of the topic icon in RGB format */
	public int $iconColor;

	/** @var string|null Optional. Unique identifier of the custom emoji shown as the topic icon */
	public ?string $iconCustomEmojiId = null;
}

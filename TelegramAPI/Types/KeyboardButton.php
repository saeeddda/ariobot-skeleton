<?php

namespace TelegramApi\Types;

class KeyboardButton implements TypeInterface
{
	/** @var string Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed */
	public string $text;

	/** @var bool|null Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only. */
	public ?bool $requestContact = null;

	/** @var bool|null Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only. */
	public ?bool $requestLocation = null;

	/** @var KeyboardButtonPollType|null Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only. */
	public ?KeyboardButtonPollType $requestPoll = null;

	/** @var WebAppInfo|null Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a “web_app_data” service message. Available in private chats only. */
	public ?WebAppInfo $webApp = null;
}

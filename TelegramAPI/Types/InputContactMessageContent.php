<?php

namespace TelegramApi\Types;

class InputContactMessageContent extends InputMessageContent
{
	/** @var string Contact's phone number */
	public string $phoneNumber;

	/** @var string Contact's first name */
	public string $firstName;

	/** @var string|null Optional. Contact's last name */
	public ?string $lastName = null;

	/** @var string|null Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes */
	public ?string $vcard = null;
}

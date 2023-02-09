<?php

namespace TelegramApi\Types;

class PassportElementErrorSelfie extends PassportElementError
{
	/** @var string Error source, must be selfie */
	public string $source = 'selfie';

	/** @var string The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport” */
	public string $type;

	/** @var string Base64-encoded hash of the file with the selfie */
	public string $fileHash;

	/** @var string Error message */
	public string $message;
}

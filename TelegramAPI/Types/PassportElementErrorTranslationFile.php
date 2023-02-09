<?php

namespace TelegramApi\Types;

class PassportElementErrorTranslationFile extends PassportElementError
{
	/** @var string Error source, must be translation_file */
	public string $source = 'translation_file';

	/** @var string Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration” */
	public string $type;

	/** @var string Base64-encoded file hash */
	public string $fileHash;

	/** @var string Error message */
	public string $message;
}

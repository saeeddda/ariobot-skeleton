<?php

namespace TelegramApi\Types;

class PassportElementErrorTranslationFiles extends PassportElementError
{
	/** @var string Error source, must be translation_files */
	public string $source = 'translation_files';

	/** @var string Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration” */
	public string $type;

	/** @var Array<string> List of base64-encoded file hashes */
	public array $fileHashes;

	/** @var string Error message */
	public string $message;
}

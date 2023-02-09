<?php

namespace TelegramApi\Types;

class PassportElementErrorDataField extends PassportElementError
{
	/** @var string Error source, must be data */
	public string $source = 'data';

	/** @var string The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address” */
	public string $type;

	/** @var string Name of the data field which has the error */
	public string $fieldName;

	/** @var string Base64-encoded data hash */
	public string $dataHash;

	/** @var string Error message */
	public string $message;
}

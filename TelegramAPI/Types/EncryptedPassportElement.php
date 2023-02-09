<?php

namespace TelegramApi\Types;

class EncryptedPassportElement implements TypeInterface
{
	/** @var string Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”. */
	public string $type;

	/** @var string|null Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?string $data = null;

	/** @var string|null Optional. User's verified phone number, available only for “phone_number” type */
	public ?string $phoneNumber = null;

	/** @var string|null Optional. User's verified email address, available only for “email” type */
	public ?string $email = null;

	/** @var Array<PassportFile>|null Optional. Array of encrypted files with documents provided by the user, available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?array $files = null;

	/** @var PassportFile|null Optional. Encrypted file with the front side of the document, provided by the user. Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?PassportFile $frontSide = null;

	/** @var PassportFile|null Optional. Encrypted file with the reverse side of the document, provided by the user. Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?PassportFile $reverseSide = null;

	/** @var PassportFile|null Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?PassportFile $selfie = null;

	/** @var Array<PassportFile>|null Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials. */
	public ?array $translation = null;

	/** @var string Base64-encoded element hash for using in PassportElementErrorUnspecified */
	public string $hash;
}

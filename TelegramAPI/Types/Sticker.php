<?php

namespace TelegramApi\Types;

class Sticker implements TypeInterface
{
	/** @var string Identifier for this file, which can be used to download or reuse the file */
	public string $fileId;

	/** @var string Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $fileUniqueId;

	/** @var string Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video. */
	public string $type;

	/** @var int Sticker width */
	public int $width;

	/** @var int Sticker height */
	public int $height;

	/** @var bool True, if the sticker is animated */
	public bool $isAnimated;

	/** @var bool True, if the sticker is a video sticker */
	public bool $isVideo;

	/** @var PhotoSize|null Optional. Sticker thumbnail in the .WEBP or .JPG format */
	public ?PhotoSize $thumb = null;

	/** @var string|null Optional. Emoji associated with the sticker */
	public ?string $emoji = null;

	/** @var string|null Optional. Name of the sticker set to which the sticker belongs */
	public ?string $setName = null;

	/** @var File|null Optional. For premium regular stickers, premium animation for the sticker */
	public ?File $premiumAnimation = null;

	/** @var MaskPosition|null Optional. For mask stickers, the position where the mask should be placed */
	public ?MaskPosition $maskPosition = null;

	/** @var string|null Optional. For custom emoji stickers, unique identifier of the custom emoji */
	public ?string $customEmojiId = null;

	/** @var int|null Optional. File size in bytes */
	public ?int $fileSize = null;
}

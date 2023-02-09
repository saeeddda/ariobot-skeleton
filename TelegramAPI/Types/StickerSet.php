<?php

namespace TelegramApi\Types;

class StickerSet implements TypeInterface
{
	/** @var string Sticker set name */
	public string $name;

	/** @var string Sticker set title */
	public string $title;

	/** @var string Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji” */
	public string $stickerType;

	/** @var bool True, if the sticker set contains animated stickers */
	public bool $isAnimated;

	/** @var bool True, if the sticker set contains video stickers */
	public bool $isVideo;

	/** @var Array<Sticker> List of all set stickers */
	public array $stickers;

	/** @var PhotoSize|null Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format */
	public ?PhotoSize $thumb = null;
}

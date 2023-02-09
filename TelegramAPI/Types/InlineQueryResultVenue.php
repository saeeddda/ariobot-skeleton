<?php

namespace TelegramApi\Types;

class InlineQueryResultVenue extends InlineQueryResult
{
	/** @var string Type of the result, must be venue */
	public string $type = 'venue';

	/** @var string Unique identifier for this result, 1-64 Bytes */
	public string $id;

	/** @var float Latitude of the venue location in degrees */
	public float $latitude;

	/** @var float Longitude of the venue location in degrees */
	public float $longitude;

	/** @var string Title of the venue */
	public string $title;

	/** @var string Address of the venue */
	public string $address;

	/** @var string|null Optional. Foursquare identifier of the venue if known */
	public ?string $foursquareId = null;

	/** @var string|null Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.) */
	public ?string $foursquareType = null;

	/** @var string|null Optional. Google Places identifier of the venue */
	public ?string $googlePlaceId = null;

	/** @var string|null Optional. Google Places type of the venue. (See supported types.) */
	public ?string $googlePlaceType = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the venue */
	public ?InputMessageContent $inputMessageContent = null;

	/** @var string|null Optional. Url of the thumbnail for the result */
	public ?string $thumbUrl = null;

	/** @var int|null Optional. Thumbnail width */
	public ?int $thumbWidth = null;

	/** @var int|null Optional. Thumbnail height */
	public ?int $thumbHeight = null;
}

<?php

namespace TelegramApi\Types;

class InlineQueryResultLocation extends InlineQueryResult
{
	/** @var string Type of the result, must be location */
	public string $type = 'location';

	/** @var string Unique identifier for this result, 1-64 Bytes */
	public string $id;

	/** @var float Location latitude in degrees */
	public float $latitude;

	/** @var float Location longitude in degrees */
	public float $longitude;

	/** @var string Location title */
	public string $title;

	/** @var float|null Optional. The radius of uncertainty for the location, measured in meters; 0-1500 */
	public ?float $horizontalAccuracy = null;

	/** @var int|null Optional. Period in seconds for which the location can be updated, should be between 60 and 86400. */
	public ?int $livePeriod = null;

	/** @var int|null Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified. */
	public ?int $heading = null;

	/** @var int|null Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified. */
	public ?int $proximityAlertRadius = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the location */
	public ?InputMessageContent $inputMessageContent = null;

	/** @var string|null Optional. Url of the thumbnail for the result */
	public ?string $thumbUrl = null;

	/** @var int|null Optional. Thumbnail width */
	public ?int $thumbWidth = null;

	/** @var int|null Optional. Thumbnail height */
	public ?int $thumbHeight = null;
}

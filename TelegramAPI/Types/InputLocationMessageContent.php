<?php

namespace TelegramApi\Types;

class InputLocationMessageContent extends InputMessageContent
{
	/** @var float Latitude of the location in degrees */
	public float $latitude;

	/** @var float Longitude of the location in degrees */
	public float $longitude;

	/** @var float|null Optional. The radius of uncertainty for the location, measured in meters; 0-1500 */
	public ?float $horizontalAccuracy = null;

	/** @var int|null Optional. Period in seconds for which the location can be updated, should be between 60 and 86400. */
	public ?int $livePeriod = null;

	/** @var int|null Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified. */
	public ?int $heading = null;

	/** @var int|null Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified. */
	public ?int $proximityAlertRadius = null;
}

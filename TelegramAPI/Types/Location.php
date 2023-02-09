<?php

namespace TelegramApi\Types;

class Location implements TypeInterface
{
	/** @var float Longitude as defined by sender */
	public float $longitude;

	/** @var float Latitude as defined by sender */
	public float $latitude;

	/** @var float|null Optional. The radius of uncertainty for the location, measured in meters; 0-1500 */
	public ?float $horizontalAccuracy = null;

	/** @var int|null Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only. */
	public ?int $livePeriod = null;

	/** @var int|null Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only. */
	public ?int $heading = null;

	/** @var int|null Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only. */
	public ?int $proximityAlertRadius = null;
}

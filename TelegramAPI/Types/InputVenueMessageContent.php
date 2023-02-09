<?php

namespace TelegramApi\Types;

class InputVenueMessageContent extends InputMessageContent
{
	/** @var float Latitude of the venue in degrees */
	public float $latitude;

	/** @var float Longitude of the venue in degrees */
	public float $longitude;

	/** @var string Name of the venue */
	public string $title;

	/** @var string Address of the venue */
	public string $address;

	/** @var string|null Optional. Foursquare identifier of the venue, if known */
	public ?string $foursquareId = null;

	/** @var string|null Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.) */
	public ?string $foursquareType = null;

	/** @var string|null Optional. Google Places identifier of the venue */
	public ?string $googlePlaceId = null;

	/** @var string|null Optional. Google Places type of the venue. (See supported types.) */
	public ?string $googlePlaceType = null;
}

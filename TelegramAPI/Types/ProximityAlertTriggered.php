<?php

namespace TelegramApi\Types;

class ProximityAlertTriggered implements TypeInterface
{
	/** @var User User that triggered the alert */
	public User $traveler;

	/** @var User User that set the alert */
	public User $watcher;

	/** @var int The distance between the users */
	public int $distance;
}

<?php

namespace TelegramApi\Types;

class VideoChatParticipantsInvited implements TypeInterface
{
	/** @var Array<User> New members that were invited to the video chat */
	public array $users;
}

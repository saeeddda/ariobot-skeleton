<?php

/**
 * @noinspection PhpUnused
 * @noinspection PhpUnusedParameterInspection
 */

namespace TelegramApi;

use TelegramApi\Types\BotCommand;
use TelegramApi\Types\BotCommandScope;
use TelegramApi\Types\Chat;
use TelegramApi\Types\ChatAdministratorRights;
use TelegramApi\Types\ChatInviteLink;
use TelegramApi\Types\ChatMember;
use TelegramApi\Types\ChatPermissions;
use TelegramApi\Types\File;
use TelegramApi\Types\ForceReply;
use TelegramApi\Types\ForumTopic;
use TelegramApi\Types\GameHighScore;
use TelegramApi\Types\InlineKeyboardMarkup;
use TelegramApi\Types\InlineQueryResult;
use TelegramApi\Types\InputFile;
use TelegramApi\Types\InputMedia;
use TelegramApi\Types\InputMediaAudio;
use TelegramApi\Types\InputMediaDocument;
use TelegramApi\Types\InputMediaPhoto;
use TelegramApi\Types\InputMediaVideo;
use TelegramApi\Types\LabeledPrice;
use TelegramApi\Types\MaskPosition;
use TelegramApi\Types\MenuButton;
use TelegramApi\Types\Message;
use TelegramApi\Types\MessageEntity;
use TelegramApi\Types\MessageId;
use TelegramApi\Types\PassportElementError;
use TelegramApi\Types\Poll;
use TelegramApi\Types\ReplyKeyboardMarkup;
use TelegramApi\Types\ReplyKeyboardRemove;
use TelegramApi\Types\SentWebAppMessage;
use TelegramApi\Types\ShippingOption;
use TelegramApi\Types\Sticker;
use TelegramApi\Types\StickerSet;
use TelegramApi\Types\Update;
use TelegramApi\Types\User;
use TelegramApi\Types\UserProfilePhotos;
use TelegramApi\Types\WebhookInfo;

trait API
{
	abstract public function sendRequest(string $method, array $args): mixed;


	/**
	 * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
	 * @param int|null $offset Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will forgotten.
	 * @param int|null $limit Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
	 * @param int|null $timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
	 * @param Array<string>|null $allowedUpdates A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time.
	 * @return Array<Update>
	 */
	public function getUpdates(
		?int $offset = null,
		?int $limit = 100,
		?int $timeout = null,
		?array $allowedUpdates = null,
	): array {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
	 * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
	 * @param string $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
	 * @param InputFile|null $certificate Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
	 * @param string|null $ipAddress The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
	 * @param int|null $maxConnections The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
	 * @param Array<string>|null $allowedUpdates A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
	 * @param bool|null $dropPendingUpdates Pass True to drop all pending updates
	 * @param string|null $secretToken A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a webhook set by you.
	 * @return bool
	 */
	public function setWebhook(
		string $url,
		?InputFile $certificate = null,
		?string $ipAddress = null,
		?int $maxConnections = 40,
		?array $allowedUpdates = null,
		?bool $dropPendingUpdates = null,
		?string $secretToken = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
	 * @param bool|null $dropPendingUpdates Pass True to drop all pending updates
	 * @return bool
	 */
	public function deleteWebhook(?bool $dropPendingUpdates = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
	 * @return WebhookInfo
	 */
	public function getWebhookInfo(): WebhookInfo
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
	 * @return User
	 */
	public function getMe(): User
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
	 * @return bool
	 */
	public function logOut(): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
	 * @return bool
	 */
	public function close(): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send text messages. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $parseMode Mode for parsing entities in the message text. See formatting options for more details.
	 * @param Array<MessageEntity>|null $entities A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
	 * @param bool|null $disableWebPagePreview Disables link previews for links in this message
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendMessage(
		int|string $chatId,
		string $text,
		?int $messageThreadId = null,
		?string $parseMode = null,
		?array $entities = null,
		?bool $disableWebPagePreview = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
	 * @param int $messageId Message identifier in the chat specified in from_chat_id
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the forwarded message from forwarding and saving
	 * @return Message
	 */
	public function forwardMessage(
		int|string $chatId,
		int|string $fromChatId,
		int $messageId,
		?int $messageThreadId = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
	 * @param int $messageId Message identifier in the chat specified in from_chat_id
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $caption New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
	 * @param string|null $parseMode Mode for parsing entities in the new caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return MessageId
	 */
	public function copyMessage(
		int|string $chatId,
		int|string $fromChatId,
		int $messageId,
		?int $messageThreadId = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): MessageId {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send photos. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $photo Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $caption Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the photo caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendPhoto(
		int|string $chatId,
		InputFile|string $photo,
		?int $messageThreadId = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
	 * For sending voice messages, use the sendVoice method instead.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $audio Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $caption Audio caption, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the audio caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param int|null $duration Duration of the audio in seconds
	 * @param string|null $performer Performer
	 * @param string|null $title Track name
	 * @param InputFile|string|null $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendAudio(
		int|string $chatId,
		InputFile|string $audio,
		?int $messageThreadId = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?int $duration = null,
		?string $performer = null,
		?string $title = null,
		InputFile|string|null $thumb = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param InputFile|string|null $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
	 * @param string|null $caption Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the document caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param bool|null $disableContentTypeDetection Disables automatic server-side content type detection for files uploaded using multipart/form-data
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendDocument(
		int|string $chatId,
		InputFile|string $document,
		?int $messageThreadId = null,
		InputFile|string|null $thumb = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?bool $disableContentTypeDetection = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param int|null $duration Duration of sent video in seconds
	 * @param int|null $width Video width
	 * @param int|null $height Video height
	 * @param InputFile|string|null $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
	 * @param string|null $caption Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the video caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param bool|null $supportsStreaming Pass True if the uploaded video is suitable for streaming
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendVideo(
		int|string $chatId,
		InputFile|string $video,
		?int $messageThreadId = null,
		?int $duration = null,
		?int $width = null,
		?int $height = null,
		InputFile|string|null $thumb = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?bool $supportsStreaming = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $animation Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param int|null $duration Duration of sent animation in seconds
	 * @param int|null $width Animation width
	 * @param int|null $height Animation height
	 * @param InputFile|string|null $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
	 * @param string|null $caption Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the animation caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendAnimation(
		int|string $chatId,
		InputFile|string $animation,
		?int $messageThreadId = null,
		?int $duration = null,
		?int $width = null,
		?int $height = null,
		InputFile|string|null $thumb = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $caption Voice message caption, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the voice message caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param int|null $duration Duration of the voice message in seconds
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendVoice(
		int|string $chatId,
		InputFile|string $voice,
		?int $messageThreadId = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?int $duration = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $videoNote Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More information on Sending Files ». Sending video notes by a URL is currently unsupported
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param int|null $duration Duration of sent video in seconds
	 * @param int|null $length Video width and height, i.e. diameter of the video message
	 * @param InputFile|string|null $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendVideoNote(
		int|string $chatId,
		InputFile|string $videoNote,
		?int $messageThreadId = null,
		?int $duration = null,
		?int $length = null,
		InputFile|string|null $thumb = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Messages that were sent is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param Array<InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo> $media A JSON-serialized array describing messages to be sent, must include 2-10 items
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param bool|null $disableNotification Sends messages silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent messages from forwarding and saving
	 * @param int|null $replyToMessageId If the messages are a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @return Array<Message>
	 */
	public function sendMediaGroup(
		int|string $chatId,
		array $media,
		?int $messageThreadId = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
	): array {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send point on the map. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param float $latitude Latitude of the location
	 * @param float $longitude Longitude of the location
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param float|null $horizontalAccuracy The radius of uncertainty for the location, measured in meters; 0-1500
	 * @param int|null $livePeriod Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
	 * @param int|null $heading For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
	 * @param int|null $proximityAlertRadius For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendLocation(
		int|string $chatId,
		float $latitude,
		float $longitude,
		?int $messageThreadId = null,
		?float $horizontalAccuracy = null,
		?int $livePeriod = null,
		?int $heading = null,
		?int $proximityAlertRadius = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param float $latitude Latitude of new location
	 * @param float $longitude Longitude of new location
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param float|null $horizontalAccuracy The radius of uncertainty for the location, measured in meters; 0-1500
	 * @param int|null $heading Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
	 * @param int|null $proximityAlertRadius The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for a new inline keyboard.
	 * @return Message|bool
	 */
	public function editMessageLiveLocation(
		float $latitude,
		float $longitude,
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?float $horizontalAccuracy = null,
		?int $heading = null,
		?int $proximityAlertRadius = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message with live location to stop
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for a new inline keyboard.
	 * @return Message|bool
	 */
	public function stopMessageLiveLocation(
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send information about a venue. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param float $latitude Latitude of the venue
	 * @param float $longitude Longitude of the venue
	 * @param string $title Name of the venue
	 * @param string $address Address of the venue
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $foursquareId Foursquare identifier of the venue
	 * @param string|null $foursquareType Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
	 * @param string|null $googlePlaceId Google Places identifier of the venue
	 * @param string|null $googlePlaceType Google Places type of the venue. (See supported types.)
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendVenue(
		int|string $chatId,
		float $latitude,
		float $longitude,
		string $title,
		string $address,
		?int $messageThreadId = null,
		?string $foursquareId = null,
		?string $foursquareType = null,
		?string $googlePlaceId = null,
		?string $googlePlaceType = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send phone contacts. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $phoneNumber Contact's phone number
	 * @param string $firstName Contact's first name
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $lastName Contact's last name
	 * @param string|null $vcard Additional data about the contact in the form of a vCard, 0-2048 bytes
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendContact(
		int|string $chatId,
		string $phoneNumber,
		string $firstName,
		?int $messageThreadId = null,
		?string $lastName = null,
		?string $vcard = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send a native poll. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $question Poll question, 1-300 characters
	 * @param Array<string> $options A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param bool|null $isAnonymous True, if the poll needs to be anonymous, defaults to True
	 * @param string|null $type Poll type, “quiz” or “regular”, defaults to “regular”
	 * @param bool|null $allowsMultipleAnswers True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
	 * @param int|null $correctOptionId 0-based identifier of the correct answer option, required for polls in quiz mode
	 * @param string|null $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
	 * @param string|null $explanationParseMode Mode for parsing entities in the explanation. See formatting options for more details.
	 * @param Array<MessageEntity>|null $explanationEntities A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode
	 * @param int|null $openPeriod Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
	 * @param int|null $closeDate Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
	 * @param bool|null $isClosed Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendPoll(
		int|string $chatId,
		string $question,
		array $options,
		?int $messageThreadId = null,
		?bool $isAnonymous = true,
		?string $type = 'regular',
		?bool $allowsMultipleAnswers = null,
		?int $correctOptionId = null,
		?string $explanation = null,
		?string $explanationParseMode = null,
		?array $explanationEntities = null,
		?int $openPeriod = null,
		?int $closeDate = null,
		?bool $isClosed = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param string|null $emoji ____simple_html_dom__voku__html_wrapper____>Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”, “🏀”, “⚽”, “🎳”, or “🎰”. Dice can have values 1-6 for “🎲”, “🎯” and “🎳”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendDice(
		int|string $chatId,
		?int $messageThreadId = null,
		?string $emoji = '🎲',
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
	 * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
	 * @return bool
	 */
	public function sendChatAction(int|string $chatId, string $action): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
	 * @param int $userId Unique identifier of the target user
	 * @param int|null $offset Sequential number of the first photo to be returned. By default, all photos are returned.
	 * @param int|null $limit Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
	 * @return UserProfilePhotos
	 */
	public function getUserProfilePhotos(int $userId, ?int $offset = null, ?int $limit = 100): UserProfilePhotos
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
	 * @param string $fileId File identifier to get information about
	 * @return File
	 */
	public function getFile(string $fileId): File
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @param int|null $untilDate Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
	 * @param bool|null $revokeMessages Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
	 * @return bool
	 */
	public function banChatMember(
		int|string $chatId,
		int $userId,
		?int $untilDate = null,
		?bool $revokeMessages = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @param bool|null $onlyIfBanned Do nothing if the user is not banned
	 * @return bool
	 */
	public function unbanChatMember(int|string $chatId, int $userId, ?bool $onlyIfBanned = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $userId Unique identifier of the target user
	 * @param ChatPermissions $permissions A JSON-serialized object for new user permissions
	 * @param int|null $untilDate Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
	 * @return bool
	 */
	public function restrictChatMember(
		int|string $chatId,
		int $userId,
		ChatPermissions $permissions,
		?int $untilDate = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @param bool|null $isAnonymous Pass True if the administrator's presence in the chat is hidden
	 * @param bool|null $canManageChat Pass True if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
	 * @param bool|null $canPostMessages Pass True if the administrator can create channel posts, channels only
	 * @param bool|null $canEditMessages Pass True if the administrator can edit messages of other users and can pin messages, channels only
	 * @param bool|null $canDeleteMessages Pass True if the administrator can delete messages of other users
	 * @param bool|null $canManageVideoChats Pass True if the administrator can manage video chats
	 * @param bool|null $canRestrictMembers Pass True if the administrator can restrict, ban or unban chat members
	 * @param bool|null $canPromoteMembers Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
	 * @param bool|null $canChangeInfo Pass True if the administrator can change chat title, photo and other settings
	 * @param bool|null $canInviteUsers Pass True if the administrator can invite new users to the chat
	 * @param bool|null $canPinMessages Pass True if the administrator can pin messages, supergroups only
	 * @param bool|null $canManageTopics Pass True if the user is allowed to create, rename, close, and reopen forum topics, supergroups only
	 * @return bool
	 */
	public function promoteChatMember(
		int|string $chatId,
		int $userId,
		?bool $isAnonymous = null,
		?bool $canManageChat = null,
		?bool $canPostMessages = null,
		?bool $canEditMessages = null,
		?bool $canDeleteMessages = null,
		?bool $canManageVideoChats = null,
		?bool $canRestrictMembers = null,
		?bool $canPromoteMembers = null,
		?bool $canChangeInfo = null,
		?bool $canInviteUsers = null,
		?bool $canPinMessages = null,
		?bool $canManageTopics = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $userId Unique identifier of the target user
	 * @param string $customTitle New custom title for the administrator; 0-16 characters, emoji are not allowed
	 * @return bool
	 */
	public function setChatAdministratorCustomTitle(int|string $chatId, int $userId, string $customTitle): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $senderChatId Unique identifier of the target sender chat
	 * @return bool
	 */
	public function banChatSenderChat(int|string $chatId, int $senderChatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $senderChatId Unique identifier of the target sender chat
	 * @return bool
	 */
	public function unbanChatSenderChat(int|string $chatId, int $senderChatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param ChatPermissions $permissions A JSON-serialized object for new default chat permissions
	 * @return bool
	 */
	public function setChatPermissions(int|string $chatId, ChatPermissions $permissions): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @return string
	 */
	public function exportChatInviteLink(int|string $chatId): string
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string|null $name Invite link name; 0-32 characters
	 * @param int|null $expireDate Point in time (Unix timestamp) when the link will expire
	 * @param int|null $memberLimit The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
	 * @param bool|null $createsJoinRequest True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
	 * @return ChatInviteLink
	 */
	public function createChatInviteLink(
		int|string $chatId,
		?string $name = null,
		?int $expireDate = null,
		?int $memberLimit = null,
		?bool $createsJoinRequest = null,
	): ChatInviteLink {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $inviteLink The invite link to edit
	 * @param string|null $name Invite link name; 0-32 characters
	 * @param int|null $expireDate Point in time (Unix timestamp) when the link will expire
	 * @param int|null $memberLimit The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
	 * @param bool|null $createsJoinRequest True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
	 * @return ChatInviteLink
	 */
	public function editChatInviteLink(
		int|string $chatId,
		string $inviteLink,
		?string $name = null,
		?int $expireDate = null,
		?int $memberLimit = null,
		?bool $createsJoinRequest = null,
	): ChatInviteLink {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
	 * @param int|string $chatId Unique identifier of the target chat or username of the target channel (in the format @channelusername)
	 * @param string $inviteLink The invite link to revoke
	 * @return ChatInviteLink
	 */
	public function revokeChatInviteLink(int|string $chatId, string $inviteLink): ChatInviteLink
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @return bool
	 */
	public function approveChatJoinRequest(int|string $chatId, int $userId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @return bool
	 */
	public function declineChatJoinRequest(int|string $chatId, int $userId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile $photo New chat photo, uploaded using multipart/form-data
	 * @return bool
	 */
	public function setChatPhoto(int|string $chatId, InputFile $photo): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @return bool
	 */
	public function deleteChatPhoto(int|string $chatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $title New chat title, 1-128 characters
	 * @return bool
	 */
	public function setChatTitle(int|string $chatId, string $title): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string|null $description New chat description, 0-255 characters
	 * @return bool
	 */
	public function setChatDescription(int|string $chatId, ?string $description = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $messageId Identifier of a message to pin
	 * @param bool|null $disableNotification Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
	 * @return bool
	 */
	public function pinChatMessage(int|string $chatId, int $messageId, ?bool $disableNotification = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Identifier of a message to unpin. If not specified, the most recent pinned message (by sending date) will be unpinned.
	 * @return bool
	 */
	public function unpinChatMessage(int|string $chatId, ?int $messageId = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @return bool
	 */
	public function unpinAllChatMessages(int|string $chatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
	 * @return bool
	 */
	public function leaveChat(int|string $chatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
	 * @return Chat
	 */
	public function getChat(int|string $chatId): Chat
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
	 * @return Array<ChatMember>
	 */
	public function getChatAdministrators(int|string $chatId): array
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get the number of members in a chat. Returns Int on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
	 * @return int
	 */
	public function getChatMemberCount(int|string $chatId): int
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get information about a member of a chat. Returns a ChatMember object on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
	 * @param int $userId Unique identifier of the target user
	 * @return ChatMember
	 */
	public function getChatMember(int|string $chatId, int $userId): ChatMember
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param string $stickerSetName Name of the sticker set to be set as the group sticker set
	 * @return bool
	 */
	public function setChatStickerSet(int|string $chatId, string $stickerSetName): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @return bool
	 */
	public function deleteChatStickerSet(int|string $chatId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
	 * @return Array<Sticker>
	 */
	public function getForumTopicIconStickers(): array
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param string $name Topic name, 1-128 characters
	 * @param int|null $iconColor Color of the topic icon in RGB format. Currently, must be one of 0x6FB9F0, 0xFFD67E, 0xCB86DB, 0x8EEE98, 0xFF93B2, or 0xFB6F5F
	 * @param string|null $iconCustomEmojiId Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
	 * @return ForumTopic
	 */
	public function createForumTopic(
		int|string $chatId,
		string $name,
		?int $iconColor = null,
		?string $iconCustomEmojiId = null,
	): ForumTopic {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
	 * @param string $name New topic name, 1-128 characters
	 * @param string $iconCustomEmojiId New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers
	 * @return bool
	 */
	public function editForumTopic(int|string $chatId, int $messageThreadId, string $name, string $iconCustomEmojiId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
	 * @return bool
	 */
	public function closeForumTopic(int|string $chatId, int $messageThreadId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
	 * @return bool
	 */
	public function reopenForumTopic(int|string $chatId, int $messageThreadId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
	 * @return bool
	 */
	public function deleteForumTopic(int|string $chatId, int $messageThreadId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
	 * @return bool
	 */
	public function unpinAllForumTopicMessages(int|string $chatId, int $messageThreadId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
	 * @param string $callbackQueryId Unique identifier for the query to be answered
	 * @param string|null $text Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
	 * @param bool|null $showAlert If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
	 * @param string|null $url URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
	 * @param int|null $cacheTime The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
	 * @return bool
	 */
	public function answerCallbackQuery(
		string $callbackQueryId,
		?string $text = null,
		?bool $showAlert = null,
		?string $url = null,
		?int $cacheTime = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to change the list of the bot's commands. See this manual for more details about bot commands. Returns True on success.
	 * @param Array<BotCommand> $commands A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
	 * @param BotCommandScope|null $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
	 * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
	 * @return bool
	 */
	public function setMyCommands(array $commands, ?BotCommandScope $scope = null, ?string $languageCode = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
	 * @param BotCommandScope|null $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
	 * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
	 * @return bool
	 */
	public function deleteMyCommands(?BotCommandScope $scope = null, ?string $languageCode = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
	 * @param BotCommandScope|null $scope A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
	 * @param string|null $languageCode A two-letter ISO 639-1 language code or an empty string
	 * @return Array<BotCommand>
	 */
	public function getMyCommands(?BotCommandScope $scope = null, ?string $languageCode = null): array
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
	 * @param int|null $chatId Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
	 * @param MenuButton|null $menuButton A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
	 * @return bool
	 */
	public function setChatMenuButton(?int $chatId = null, ?MenuButton $menuButton = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
	 * @param int|null $chatId Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
	 * @return MenuButton
	 */
	public function getChatMenuButton(?int $chatId = null): MenuButton
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are are free to modify the list before adding the bot. Returns True on success.
	 * @param ChatAdministratorRights|null $rights A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
	 * @param bool|null $forChannels Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
	 * @return bool
	 */
	public function setMyDefaultAdministratorRights(
		?ChatAdministratorRights $rights = null,
		?bool $forChannels = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
	 * @param bool|null $forChannels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
	 * @return ChatAdministratorRights
	 */
	public function getMyDefaultAdministratorRights(?bool $forChannels = null): ChatAdministratorRights
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param string $text New text of the message, 1-4096 characters after entities parsing
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param string|null $parseMode Mode for parsing entities in the message text. See formatting options for more details.
	 * @param Array<MessageEntity>|null $entities A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
	 * @param bool|null $disableWebPagePreview Disables link previews for links in this message
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for an inline keyboard.
	 * @return Message|bool
	 */
	public function editMessageText(
		string $text,
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?string $parseMode = null,
		?array $entities = null,
		?bool $disableWebPagePreview = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param string|null $caption New caption of the message, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Mode for parsing entities in the message caption. See formatting options for more details.
	 * @param Array<MessageEntity>|null $captionEntities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for an inline keyboard.
	 * @return Message|bool
	 */
	public function editMessageCaption(
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?string $caption = null,
		?string $parseMode = null,
		?array $captionEntities = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param InputMedia $media A JSON-serialized object for a new media content of the message
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for a new inline keyboard.
	 * @return Message|bool
	 */
	public function editMessageMedia(
		InputMedia $media,
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
	 * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for an inline keyboard.
	 * @return Message|bool
	 */
	public function editMessageReplyMarkup(
		int|string|null $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $messageId Identifier of the original message with the poll
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for a new message inline keyboard.
	 * @return Poll
	 */
	public function stopPoll(int|string $chatId, int $messageId, ?InlineKeyboardMarkup $replyMarkup = null): Poll
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum topic creation can't be deleted.- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns True on success.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param int $messageId Identifier of the message to delete
	 * @return bool
	 */
	public function deleteMessage(int|string $chatId, int $messageId): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param InputFile|string $sticker Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a .WEBP file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
	 * @return Message
	 */
	public function sendSticker(
		int|string $chatId,
		InputFile|string $sticker,
		?int $messageThreadId = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get a sticker set. On success, a StickerSet object is returned.
	 * @param string $name Name of the sticker set
	 * @return StickerSet
	 */
	public function getStickerSet(string $name): StickerSet
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
	 * @param Array<string> $customEmojiIds List of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
	 * @return Array<Sticker>
	 */
	public function getCustomEmojiStickers(array $customEmojiIds): array
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times). Returns the uploaded File on success.
	 * @param int $userId User identifier of sticker file owner
	 * @param InputFile $pngSticker PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. More information on Sending Files »
	 * @return File
	 */
	public function uploadStickerFile(int $userId, InputFile $pngSticker): File
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Returns True on success.
	 * @param int $userId User identifier of created sticker set owner
	 * @param string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
	 * @param string $title Sticker set title, 1-64 characters
	 * @param string $emojis One or more emoji corresponding to the sticker
	 * @param InputFile|string|null $pngSticker PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param InputFile|null $tgsSticker TGS animation with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#animated-sticker-requirements for technical requirements
	 * @param InputFile|null $webmSticker WEBM video with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#video-sticker-requirements for technical requirements
	 * @param string|null $stickerType Type of stickers in the set, pass “regular” or “mask”. Custom emoji sticker sets can't be created via the Bot API at the moment. By default, a regular sticker set is created.
	 * @param MaskPosition|null $maskPosition A JSON-serialized object for position where the mask should be placed on faces
	 * @return bool
	 */
	public function createNewStickerSet(
		int $userId,
		string $name,
		string $title,
		string $emojis,
		InputFile|string|null $pngSticker = null,
		?InputFile $tgsSticker = null,
		?InputFile $webmSticker = null,
		?string $stickerType = null,
		?MaskPosition $maskPosition = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to add a new sticker to a set created by the bot. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Animated stickers can be added to animated sticker sets and only to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
	 * @param int $userId User identifier of sticker set owner
	 * @param string $name Sticker set name
	 * @param string $emojis One or more emoji corresponding to the sticker
	 * @param InputFile|string|null $pngSticker PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
	 * @param InputFile|null $tgsSticker TGS animation with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#animated-sticker-requirements for technical requirements
	 * @param InputFile|null $webmSticker WEBM video with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#video-sticker-requirements for technical requirements
	 * @param MaskPosition|null $maskPosition A JSON-serialized object for position where the mask should be placed on faces
	 * @return bool
	 */
	public function addStickerToSet(
		int $userId,
		string $name,
		string $emojis,
		InputFile|string|null $pngSticker = null,
		?InputFile $tgsSticker = null,
		?InputFile $webmSticker = null,
		?MaskPosition $maskPosition = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
	 * @param string $sticker File identifier of the sticker
	 * @param int $position New sticker position in the set, zero-based
	 * @return bool
	 */
	public function setStickerPositionInSet(string $sticker, int $position): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to delete a sticker from a set created by the bot. Returns True on success.
	 * @param string $sticker File identifier of the sticker
	 * @return bool
	 */
	public function deleteStickerFromSet(string $sticker): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Video thumbnails can be set only for video sticker sets only. Returns True on success.
	 * @param string $name Sticker set name
	 * @param int $userId User identifier of the sticker set owner
	 * @param InputFile|string|null $thumb A PNG image with the thumbnail, must be up to 128 kilobytes in size and have width and height exactly 100px, or a TGS animation with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#animated-sticker-requirements for animated sticker technical requirements, or a WEBM video with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#video-sticker-requirements for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files ». Animated sticker set thumbnails can't be uploaded via HTTP URL.
	 * @return bool
	 */
	public function setStickerSetThumb(string $name, int $userId, InputFile|string|null $thumb = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
	 * @param string $inlineQueryId Unique identifier for the answered query
	 * @param Array<InlineQueryResult> $results A JSON-serialized array of results for the inline query
	 * @param int|null $cacheTime The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
	 * @param bool|null $isPersonal Pass True if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query
	 * @param string|null $nextOffset Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
	 * @param string|null $switchPmText If passed, clients will display a button with specified text that switches the user to a private chat with the bot and sends the bot a start message with the parameter switch_pm_parameter
	 * @param string|null $switchPmParameter Deep-linking parameter for the /start message sent to the bot when user presses the switch button. 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos can ask the user to connect the bot to their YouTube account to adapt search results accordingly. To do this, it displays a 'Connect your YouTube account' button above the results, or even before showing any. The user presses the button, switches to a private chat with the bot and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot can offer a switch_inline button so that the user can easily return to the chat where they wanted to use the bot's inline capabilities.
	 * @return bool
	 */
	public function answerInlineQuery(
		string $inlineQueryId,
		array $results,
		?int $cacheTime = 300,
		?bool $isPersonal = null,
		?string $nextOffset = null,
		?string $switchPmText = null,
		?string $switchPmParameter = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
	 * @param string $webAppQueryId Unique identifier for the query to be answered
	 * @param InlineQueryResult $result A JSON-serialized object describing the message to be sent
	 * @return SentWebAppMessage
	 */
	public function answerWebAppQuery(string $webAppQueryId, InlineQueryResult $result): SentWebAppMessage
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send invoices. On success, the sent Message is returned.
	 * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
	 * @param string $title Product name, 1-32 characters
	 * @param string $description Product description, 1-255 characters
	 * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
	 * @param string $providerToken Payment provider token, obtained via @BotFather
	 * @param string $currency Three-letter ISO 4217 currency code, see more on currencies
	 * @param Array<LabeledPrice> $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param int|null $maxTipAmount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
	 * @param Array<int>|null $suggestedTipAmounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
	 * @param string|null $startParameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
	 * @param string|null $providerData JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
	 * @param string|null $photoUrl URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
	 * @param int|null $photoSize Photo size in bytes
	 * @param int|null $photoWidth Photo width
	 * @param int|null $photoHeight Photo height
	 * @param bool|null $needName Pass True if you require the user's full name to complete the order
	 * @param bool|null $needPhoneNumber Pass True if you require the user's phone number to complete the order
	 * @param bool|null $needEmail Pass True if you require the user's email address to complete the order
	 * @param bool|null $needShippingAddress Pass True if you require the user's shipping address to complete the order
	 * @param bool|null $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to provider
	 * @param bool|null $sendEmailToProvider Pass True if the user's email address should be sent to provider
	 * @param bool|null $isFlexible Pass True if the final price depends on the shipping method
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
	 * @return Message
	 */
	public function sendInvoice(
		int|string $chatId,
		string $title,
		string $description,
		string $payload,
		string $providerToken,
		string $currency,
		array $prices,
		?int $messageThreadId = null,
		?int $maxTipAmount = null,
		?array $suggestedTipAmounts = null,
		?string $startParameter = null,
		?string $providerData = null,
		?string $photoUrl = null,
		?int $photoSize = null,
		?int $photoWidth = null,
		?int $photoHeight = null,
		?bool $needName = null,
		?bool $needPhoneNumber = null,
		?bool $needEmail = null,
		?bool $needShippingAddress = null,
		?bool $sendPhoneNumberToProvider = null,
		?bool $sendEmailToProvider = null,
		?bool $isFlexible = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
	 * @param string $title Product name, 1-32 characters
	 * @param string $description Product description, 1-255 characters
	 * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
	 * @param string $providerToken Payment provider token, obtained via BotFather
	 * @param string $currency Three-letter ISO 4217 currency code, see more on currencies
	 * @param Array<LabeledPrice> $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
	 * @param int|null $maxTipAmount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
	 * @param Array<int>|null $suggestedTipAmounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
	 * @param string|null $providerData JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
	 * @param string|null $photoUrl URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
	 * @param int|null $photoSize Photo size in bytes
	 * @param int|null $photoWidth Photo width
	 * @param int|null $photoHeight Photo height
	 * @param bool|null $needName Pass True if you require the user's full name to complete the order
	 * @param bool|null $needPhoneNumber Pass True if you require the user's phone number to complete the order
	 * @param bool|null $needEmail Pass True if you require the user's email address to complete the order
	 * @param bool|null $needShippingAddress Pass True if you require the user's shipping address to complete the order
	 * @param bool|null $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to the provider
	 * @param bool|null $sendEmailToProvider Pass True if the user's email address should be sent to the provider
	 * @param bool|null $isFlexible Pass True if the final price depends on the shipping method
	 * @return string
	 */
	public function createInvoiceLink(
		string $title,
		string $description,
		string $payload,
		string $providerToken,
		string $currency,
		array $prices,
		?int $maxTipAmount = null,
		?array $suggestedTipAmounts = null,
		?string $providerData = null,
		?string $photoUrl = null,
		?int $photoSize = null,
		?int $photoWidth = null,
		?int $photoHeight = null,
		?bool $needName = null,
		?bool $needPhoneNumber = null,
		?bool $needEmail = null,
		?bool $needShippingAddress = null,
		?bool $sendPhoneNumberToProvider = null,
		?bool $sendEmailToProvider = null,
		?bool $isFlexible = null,
	): string {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
	 * @param string $shippingQueryId Unique identifier for the query to be answered
	 * @param bool $ok Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
	 * @param Array<ShippingOption>|null $shippingOptions Required if ok is True. A JSON-serialized array of available shipping options.
	 * @param string|null $errorMessage Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the user.
	 * @return bool
	 */
	public function answerShippingQuery(
		string $shippingQueryId,
		bool $ok,
		?array $shippingOptions = null,
		?string $errorMessage = null,
	): bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
	 * @param string $preCheckoutQueryId Unique identifier for the query to be answered
	 * @param bool $ok Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
	 * @param string|null $errorMessage Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
	 * @return bool
	 */
	public function answerPreCheckoutQuery(string $preCheckoutQueryId, bool $ok, ?string $errorMessage = null): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
	 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
	 * @param int $userId User identifier
	 * @param Array<PassportElementError> $errors A JSON-serialized array describing the errors
	 * @return bool
	 */
	public function setPassportDataErrors(int $userId, array $errors): bool
	{
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to send a game. On success, the sent Message is returned.
	 * @param int $chatId Unique identifier for the target chat
	 * @param string $gameShortName Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
	 * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
	 * @param bool|null $disableNotification Sends the message silently. Users will receive a notification with no sound.
	 * @param bool|null $protectContent Protects the contents of the sent message from forwarding and saving
	 * @param int|null $replyToMessageId If the message is a reply, ID of the original message
	 * @param bool|null $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
	 * @param InlineKeyboardMarkup|null $replyMarkup A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
	 * @return Message
	 */
	public function sendGame(
		int $chatId,
		string $gameShortName,
		?int $messageThreadId = null,
		?bool $disableNotification = null,
		?bool $protectContent = null,
		?int $replyToMessageId = null,
		?bool $allowSendingWithoutReply = null,
		?InlineKeyboardMarkup $replyMarkup = null,
	): Message {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
	 * @param int $userId User identifier
	 * @param int $score New score, must be non-negative
	 * @param bool|null $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
	 * @param bool|null $disableEditMessage Pass True if the game message should not be automatically edited to include the current scoreboard
	 * @param int|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the sent message
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @return Message|bool
	 */
	public function setGameScore(
		int $userId,
		int $score,
		?bool $force = null,
		?bool $disableEditMessage = null,
		?int $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
	): Message|bool {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}


	/**
	 * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
	 * @param int $userId Target user id
	 * @param int|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
	 * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the sent message
	 * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
	 * @return Array<GameHighScore>
	 */
	public function getGameHighScores(
		int $userId,
		?int $chatId = null,
		?int $messageId = null,
		?string $inlineMessageId = null,
	): array {
		$args = get_defined_vars();
		return $this->sendRequest(__FUNCTION__, $args);
	}
}

<?php

namespace TelegramApi\Types;

class InlineKeyboardMarkup implements TypeInterface
{
	/** @var Array<Array<InlineKeyboardButton>> Array of button rows, each represented by an Array of InlineKeyboardButton objects */
	public array $inlineKeyboard;
}

<?php

namespace TelegramApi\Types;

class Dice implements TypeInterface
{
	/** @var string Emoji on which the dice throw animation is based */
	public string $emoji;

	/** @var int ____simple_html_dom__voku__html_wrapper____>Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji */
	public int $value;
}

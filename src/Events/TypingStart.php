<?php

namespace Soft321\Discord\Events;

interface TypingStart {

	public function typing_start(
		\Discord\Parts\WebSockets\TypingStart $typingStart,
		\Discord\Discord $discord
	);

}
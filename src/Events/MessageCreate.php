<?php

namespace Soft321\Discord\Events;

interface MessageCreate {

	public function message_create(
		\Discord\Parts\Channel\Message $message,
		\Discord\Discord $discord
	);

}
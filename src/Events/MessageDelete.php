<?php

namespace Soft321\Discord\Events;

interface MessageDelete {

	public function message_delete(
		\Discord\Parts\Channel\Message $message,
		\Discord\Discord $discord
	);

}
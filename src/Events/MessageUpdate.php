<?php

namespace Soft321\Discord\Events;

interface MessageUpdate {

	public function message_update(
		\Discord\Parts\Channel\Message $new,
		\Discord\Discord $discord,
		\Discord\Parts\Channel\Message $old,
	);

}
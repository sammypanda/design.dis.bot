<?php

namespace Soft321\Discord\Events;

interface MessageReactionRemove {

	public function message_reaction_remove(
		\Discord\Parts\WebSockets\MessageReaction $reaction,
		\Discord\Discord $discord
	);

}
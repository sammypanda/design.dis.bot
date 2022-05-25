<?php

namespace Soft321\Discord\Events;

interface MessageReactionRemoveAll {

	public function message_reaction_remove_all(
		\Discord\Parts\WebSockets\MessageReaction $reaction,
		\Discord\Discord $discord
	);

}
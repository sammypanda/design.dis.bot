<?php

namespace Soft321\Discord\Events;

interface MessageReactionRemoveEmoji {

	public function message_reaction_remove_emoji(
		\Discord\Parts\WebSockets\MessageReaction $reaction,
		\Discord\Discord $discord
	);

}
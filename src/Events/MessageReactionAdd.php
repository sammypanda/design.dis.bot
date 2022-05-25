<?php

namespace Soft321\Discord\Events;

interface MessageReactionAdd {

	public function message_reaction_add(
		\Discord\Parts\WebSockets\MessageReaction $reaction,
		\Discord\Discord $discord
	);

}
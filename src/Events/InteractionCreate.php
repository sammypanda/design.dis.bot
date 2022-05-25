<?php

namespace Soft321\Discord\Events;

interface InteractionCreate {

	public function interaction_create(
		\Discord\Parts\Interactions\Interaction $interaction,
		\Discord\Discord $discord
	);

}
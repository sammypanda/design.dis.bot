<?php

namespace Soft321\Discord\Events;

interface PresenceUpdate {

	public function presence_update(
		\Discord\Parts\WebSockets\PresenceUpdate $presenceUpdate,
		\Discord\Discord $discord
	);

}
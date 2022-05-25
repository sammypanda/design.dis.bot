<?php

namespace Soft321\Discord\Events;

interface GuildDelete {

	public function guild_delete(
		\Discord\Parts\Guild\Guild $guild,
		\Discord\Discord $discord
	);

}
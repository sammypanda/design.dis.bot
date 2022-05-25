<?php

namespace Soft321\Discord\Events;

interface GuildUpdate {

	public function guild_update(
		\Discord\Parts\Guild\Guild $new,
		\Discord\Discord $discord,
		\Discord\Parts\Guild\Guild $old
	);

}
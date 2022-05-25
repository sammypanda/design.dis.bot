<?php

namespace Soft321\Discord\Events;

interface GuildCreate {

	public function guild_create( \Discord\Parts\Guild\Guild $guild, \Discord\Discord $discord );

}
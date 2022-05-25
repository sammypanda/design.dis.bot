<?php

namespace Soft321\Discord\Events;

interface GuildEmojisUpdate {

	public function guild_emojis_update( \Discord\Helpers\Collection $emojis, \Discord\Discord $discord );

}
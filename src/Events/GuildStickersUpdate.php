<?php

namespace Soft321\Discord\Events;

interface GuildStickersUpdate {

	public function guild_stickers_update( \Discord\Discord $discord );

}
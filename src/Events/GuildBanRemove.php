<?php

namespace Soft321\Discord\Events;

interface GuildBanRemove {

	public function guild_ban_remove( \Discord\Parts\Guild\Ban $ban, \Discord\Discord $discord );

}
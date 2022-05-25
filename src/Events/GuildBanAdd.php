<?php

namespace Soft321\Discord\Events;

interface GuildBanAdd {

	public function guild_ban_add( \Discord\Parts\Guild\Ban $ban, \Discord\Discord $discord );

}
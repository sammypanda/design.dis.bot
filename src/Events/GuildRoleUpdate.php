<?php

namespace Soft321\Discord\Events;

interface GuildRoleUpdate {

	public function guild_role_update(
		\Discord\Parts\Guild\Role $new,
		\Discord\Discord $discord,
		\Discord\Parts\Guild\Role $old,
	);

}
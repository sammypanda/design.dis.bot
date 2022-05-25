<?php

namespace Soft321\Discord\Events;

interface GuildRoleDelete {

	public function guild_role_delete( \Discord\Parts\Guild\Role $role, \Discord\Discord $discord );

}
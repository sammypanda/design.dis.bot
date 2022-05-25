<?php

namespace Soft321\Discord\Events;

interface GuildRoleCreate {

	public function guild_role_create( \Discord\Parts\Guild\Role $role, \Discord\Discord $discord );

}
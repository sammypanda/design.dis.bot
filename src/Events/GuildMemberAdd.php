<?php

namespace Soft321\Discord\Events;

interface GuildMemberAdd {

	public function guild_member_add(
		\Discord\Parts\User\Member $member,
		\Discord\Discord $discord
	);

}
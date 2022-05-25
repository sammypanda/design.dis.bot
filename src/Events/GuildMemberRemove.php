<?php

namespace Soft321\Discord\Events;

interface GuildMemberRemove {

	public function guild_member_remove(
		\Discord\Parts\User\Member $member,
		\Discord\Discord $discord
	);

}
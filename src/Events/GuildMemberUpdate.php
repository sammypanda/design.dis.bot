<?php

namespace Soft321\Discord\Events;

interface GuildMemberUpdate {

	public function guild_member_update(
		\Discord\Parts\User\Member $new,
		\Discord\Discord $discord,
		\Discord\Parts\User\Member $old
	);

}
<?php

namespace Soft321\Discord\Events;

interface ThreadMemberUpdate {

	public function thread_member_update(
		\Discord\Parts\Thread\Member $member,
		\Discord\Discord $discord
	);

}
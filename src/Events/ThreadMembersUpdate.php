<?php

namespace Soft321\Discord\Events;

interface ThreadMembersUpdate {

	public function thread_members_update(
		\Discord\Parts\Thread\Thread $thread,
		\Discord\Discord $discord
	);

}
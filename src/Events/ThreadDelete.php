<?php

namespace Soft321\Discord\Events;

interface ThreadDelete {

	public function thread_delete(
		\Discord\Parts\Thread\Thread $thread,
		\Discord\Discord $discord
	);

}
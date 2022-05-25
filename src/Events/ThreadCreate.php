<?php

namespace Soft321\Discord\Events;

interface ThreadCreate {

	public function thread_create(
		\Discord\Parts\Thread\Thread $thread,
		\Discord\Discord $discord
	);

}
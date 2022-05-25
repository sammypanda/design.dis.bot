<?php

namespace Soft321\Discord\Events;

interface ThreadUpdate {

	public function thread_update(
		\Discord\Parts\Thread\Thread $new,
		\Discord\Discord $discord,
		\Discord\Parts\Thread\Thread $old
	);

}
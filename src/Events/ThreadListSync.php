<?php

namespace Soft321\Discord\Events;

interface ThreadListSync {

	public function thread_list_sync(
		\Discord\Helpers\Collection $threads,
		\Discord\Discord $discord
	);

}
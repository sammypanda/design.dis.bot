<?php

namespace Soft321\Discord\Events;

interface MessageDeleteBulk {

	public function message_delete_bulk(
		\Discord\Helpers\Collection $messages,
		\Discord\Discord $discord
	);

}
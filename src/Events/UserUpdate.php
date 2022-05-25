<?php

namespace Soft321\Discord\Events;

interface UserUpdate {

	public function user_update(
		\Discord\Parts\User\User $user,
		\Discord\Discord $discord
	);

}
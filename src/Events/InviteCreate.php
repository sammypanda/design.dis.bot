<?php

namespace Soft321\Discord\Events;

interface InviteCreate {

	public function invite_create(
		\Discord\Parts\Channel\Invite $invite,
		\Discord\Discord $discord
	);

}
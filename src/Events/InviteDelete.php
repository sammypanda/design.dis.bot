<?php

namespace Soft321\Discord\Events;

interface InviteDelete {

	public function invite_delete( \Discord\Parts\Channel\Invite $invite, \Discord\Discord $discord );

}
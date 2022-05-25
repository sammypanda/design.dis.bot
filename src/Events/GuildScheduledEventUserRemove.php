<?php

namespace Soft321\Discord\Events;

interface GuildScheduledEventUserRemove {

	public function guild_scheduled_event_user_remove( \Discord\Discord $discord );

}
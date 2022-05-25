<?php

namespace Soft321\Discord\Events;

interface GuildScheduledEventUserAdd {

	public function guild_scheduled_event_user_add( \Discord\Discord $discord );

}
<?php

namespace Soft321\Discord\Events;

interface GuildScheduledEventDelete {

	public function guild_scheduled_event_delete( \Discord\Discord $discord );

}
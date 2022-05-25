<?php

namespace Soft321\Discord\Events;

interface GuildScheduledEventUpdate {

	public function guild_scheduled_event_update( \Discord\Discord $discord );

}
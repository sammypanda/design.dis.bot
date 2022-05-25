<?php

namespace Soft321\Discord\Events;

interface GuildScheduledEventCreate {

	public function guild_scheduled_event_create( \Discord\Discord $discord );

}
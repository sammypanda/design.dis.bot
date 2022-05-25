<?php

namespace Soft321\Discord\Events;

interface GuildMembersChunk {

	public function guild_members_chunk( \Discord\Discord $discord );

}
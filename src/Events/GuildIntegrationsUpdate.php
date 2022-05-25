<?php

namespace Soft321\Discord\Events;

interface GuildIntegrationsUpdate {

	public function guild_integrations_update(
		\Discord\Parts\Guild\Guild $guild,
		\Discord\Discord $discord
	);

}
<?php

namespace Soft321\Discord\Events;

interface WebhooksUpdate {

	public function webhooks_update(
		\Discord\Parts\Guild\Guild $guild,
		\Discord\Discord $discord,
		\Discord\Parts\Channel\Channel $channel,
	);

}
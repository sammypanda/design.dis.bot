<?php

namespace Soft321\Discord\Events;

interface ChannelCreate {

	public function channel_create(
		\Discord\Parts\Channel\Channel $channel,
		\Discord\Discord $discord
	);

}
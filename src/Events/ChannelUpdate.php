<?php

namespace Soft321\Discord\Events;

interface ChannelUpdate {

	public function channel_update( \Discord\Parts\Channel\Channel $channel, \Discord\Discord $discord );

}
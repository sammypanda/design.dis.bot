<?php

namespace Soft321\Discord\Events;

interface ChannelPinsUpdate {

	public function channel_pins_update( \Discord\Parts\Channel\Channel $channel, \Discord\Discord $discord );

}
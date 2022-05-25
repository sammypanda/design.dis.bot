<?php

namespace Soft321\Discord\Events;

interface ChannelDelete {

	public function channel_delete( \Discord\Parts\Channel\Channel $channel, \Discord\Discord $discord );

}
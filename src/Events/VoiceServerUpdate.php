<?php

namespace Soft321\Discord\Events;

interface VoiceServerUpdate {

	public function voice_server_update(
		\Discord\Parts\WebSockets\VoiceServerUpdate $guild,
		\Discord\Discord $discord
	);

}
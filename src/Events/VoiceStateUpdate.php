<?php

namespace Soft321\Discord\Events;

interface VoiceStateUpdate {

	public function voice_state_update( \Discord\Discord $discord );

}
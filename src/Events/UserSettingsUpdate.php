<?php

namespace Soft321\Discord\Events;

interface UserSettingsUpdate {

	public function user_settings_update( \Discord\Discord $discord );

}
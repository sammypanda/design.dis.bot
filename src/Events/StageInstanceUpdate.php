<?php

namespace Soft321\Discord\Events;

interface StageInstanceUpdate {

	public function stage_instance_update(
		\Discord\Parts\Channel\StageInstance $new,
		\Discord\Discord $discord,
		\Discord\Parts\Channel\StageInstance $old,
	);

}
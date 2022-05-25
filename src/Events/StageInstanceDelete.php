<?php

namespace Soft321\Discord\Events;

interface StageInstanceDelete {

	public function stage_instance_delete(
		\Discord\Parts\Channel\StageInstance $stageInstance,
		\Discord\Discord $discord
	);

}
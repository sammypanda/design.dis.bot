<?php

namespace Soft321\Discord\Events;

interface StageInstanceCreate {

	public function stage_instance_create(
		\Discord\Parts\Channel\StageInstance $stageInstance,
		\Discord\Discord $discord
	);

}
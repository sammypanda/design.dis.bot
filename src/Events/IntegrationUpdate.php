<?php

namespace Soft321\Discord\Events;

interface IntegrationUpdate {

	public function integration_update(
		\Discord\Parts\Guild\Integration $new,
		\Discord\Discord $discord,
		\Discord\Parts\Guild\Integration $old,
	);

}
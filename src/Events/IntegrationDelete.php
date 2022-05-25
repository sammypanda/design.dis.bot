<?php

namespace Soft321\Discord\Events;

interface IntegrationDelete {

	public function integration_delete(
		\Discord\Parts\Guild\Integration $integration,
		\Discord\Discord $discord
	);

}
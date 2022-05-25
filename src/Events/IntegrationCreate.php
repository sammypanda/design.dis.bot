<?php

namespace Soft321\Discord\Events;

interface IntegrationCreate {

	public function integration_create(
		\Discord\Parts\Guild\Integration $integration,
		\Discord\Discord $discord
	);

}
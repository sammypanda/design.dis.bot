<?php

// Master try block.
try {

#
# Import configuration files.
#

// Autoloading stuff.
require 'conf/autoload.php';

// Per-user supplied local config (e.g. secret bot token). Not to be committed.
require 'conf/env.php';

#
# Bring the bot online.
#

$discord = new Discord\Discord([

	'token'          => $_ENV[ 'BOT_TOKEN' ],
	'loadAllMembers' => true,
	'loop'           => \React\EventLoop\Factory::create(),
	'logger'         => new \Monolog\Logger( 'DiscordPHP' ),
	'intents'        => \Discord\WebSockets\Intents::getDefaultIntents() |
	                    \Discord\WebSockets\Intents::GUILD_MEMBERS,

]);

// When the bot says it is ready.
$discord->on( 'ready', function( Discord\Discord $discord ) {

	#
	# Register events to event handlers.
	#

	// Register each active handler to its corresponding event.
	$em = new Soft321\Discord\Engine\ExtensionManager( $_ENV[ 'EXT_DIR' ] );
	$em->registerExtensions( $discord );

});

// Start the bot.
$discord->run();

// Master catch block, for unhandled exceptions system-wide.
} catch( \Exception $e ) {

	// Send email alert to admin.
	Soft321\Services::mail(

		$_ENV[ 'ADMIN_EMAIL' ],
		$e->getMessage(),
		$e->getTraceAsString()

	);

}

<?php

namespace Soft321\Discord\Extensions;

use \Soft321\Discord\Events\MessageCreate;
use \Discord\Parts\Channel\Message;
use \Discord\Discord;

class BumpReminder implements MessageCreate {

	public function message_create(Message $message, Discord $discord) {

		// DO NOT reply to a Bot message (prevent endless loop)!!!
		if( $message->author->id !== $_ENV[ 'BOT_ID' ] ) {		

			// If the message was sent by Disboard.
			if( $message->author->id === $_ENV[ 'DISBOARD_ID' ] ) {

				// Check to see if bump was done.
				$first_embed = $message->embeds->first();
				$description = $first_embed->description;
				if( str_contains( $description, "Bump done!") ) {

					// Thank them.
					$mentions_id = $message->interaction->user->id;
					$thank_you = "Thanks for bumping <@$mentions_id>!";
					$message->channel->sendMessage( $thank_you );
					
				    // Wait 2 hours, then remind them again.
					$seconds = 7200;
					$channel_to = $message->channel;
				    $discord->getLoop()->addTimer(
						$seconds,
						function() use( $channel_to ) {
							
					        $bumpText = "Bump alert! Please type `/bump` to bump the server.";
					        $channel_to->sendMessage( $bumpText );
						
				    	}
					);

				}

			}

		}

	}// message_create

}
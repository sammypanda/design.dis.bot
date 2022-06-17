<?php

namespace Soft321\Discord\Extensions;

use \Soft321\Discord\Events\MessageReactionAdd;
use \Discord\Parts\WebSockets\MessageReaction;
use \Discord\Discord;
use \Discord\Parts\Channel\Message;

class AgeTrap implements MessageReactionAdd {

	public function message_reaction_add(MessageReaction $reaction, Discord $discord) {

		// Ignore Carl-bot added reactions, so we don't ban Carl.
		if( $reaction->user_id !== '235148962103951360' ) {		

			// If we're in the specified channel and
			// the disallowed age range emoji is selected
			if( $reaction->channel->name === 'rules' &&
				$reaction->emoji->name === '🚨' ) {

				// Ban the user.
				$reaction->guild->bans->ban(
					$reaction->user_id,               // their id
					7,                                // delete msgs for N days
					"Age not allowed on this server." // ban msg
				);

				// Remove the reaction, for their privacy.
				// Delete reaction from channel.
				$discord->getChannel( $reaction->channel_id )
						->getMessage( $reaction->message_id )
						->done(function( Message $message ) use( $reaction ) {

						$message->deleteReaction(
							Message::REACT_DELETE_ID,
							$reaction->emoji->name,
							$reaction->user_id
						);

				});

			}

		}

	}// message_reaction_add

}
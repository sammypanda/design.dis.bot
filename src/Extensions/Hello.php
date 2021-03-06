<?php

namespace Soft321\Discord\Extensions;

use \Soft321\Discord\Events\MessageCreate;
use \Discord\Parts\Channel\Message;
use \Discord\Discord;

class Hello implements MessageCreate {

	public function message_create(Message $message, Discord $discord) {

		// DO NOT reply to a Bot message (prevent endless loop)!!!
		if( $message->author->id !== $_ENV[ 'BOT_ID' ] ) {		

			if( preg_match( '/hello/', $message->content ) ) {
			
				$places = [ 'world', 'galaxy', 'universe' ];
				shuffle( $places );
				$message->channel->sendMessage( $places[ 0 ] );
			
			}

		}

	}

}
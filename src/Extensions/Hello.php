<?php

namespace Soft321\Discord\Extensions;

class Hello implements \Soft321\Discord\Events\MessageCreate {

	public function message_create(\Discord\Parts\Channel\Message $message, \Discord\Discord $discord) {

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
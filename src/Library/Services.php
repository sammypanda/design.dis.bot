<?php

namespace Soft321;

class Services {

	/**
	 * @return an instance of the DBMS object.
	 */
	public static function dbms( $db_name ) {

		$object = new Database\DBMS(
			$_ENV['DB_DSN'],
			$_ENV['DB_USER'],
			$_ENV['DB_PASS'],
			$_ENV['PATH_TO_QUERIES']
		);
		$object->use( $db_name );
		return $object;

	}

	public static function mail( $to, $subject, $message ) {

		$transport = \Symfony\Component\Mailer\Transport::fromDsn(
			$_ENV[ 'APP_EMAIL_DSN' ]
		);
		$mailer = new \Symfony\Component\Mailer\Mailer( $transport );
		$email = ( new \Symfony\Component\Mime\Email() )
			->from( $_ENV[ 'APP_EMAIL' ] )
			->to( $to )
			->priority( \Symfony\Component\Mime\Email::PRIORITY_HIGH )
			->subject( $subject )
			->text( $message );
		$mailer->send( $email );

	}

	public static function logger( $filename = 'app' ) {

		// Create monolog instance.
		$logger   = new \Monolog\Logger( __FUNCTION__ );

		// Attach stream handlers.
		$logpath  = $_ENV[ 'LOGPATH' ];
		$handlers = [

			new \Monolog\Handler\StreamHandler("$logpath/$filename.log", \Monolog\Logger::DEBUG, false),
			new \Monolog\Handler\StreamHandler("$logpath/$filename.log", \Monolog\Logger::INFO, false),
			new \Monolog\Handler\StreamHandler("$logpath/$filename.log", \Monolog\Logger::NOTICE, false),
	
		];
		foreach( $handlers as $handler ) {

			$logger->pushHandler( $handler );

		}
		return $logger;
	
	}

}

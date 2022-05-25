<?php

namespace Soft321\Discord\Engine;

class ExtensionManager {

	protected $meta_extensions;

	function __construct( $ext_dir ) {

		// Build meta extensions from classes in $ext_dir, using reflection.
		$f_type                = ".php";
		$this->meta_extensions = array_map(
			function( $val ) use( $f_type ) {
				return new \ReflectionClass(
					"\\Soft321\\Discord\\Extensions\\".basename( $val, $f_type )
				);
			},
			glob( "$ext_dir/*$f_type" )
		);

	}

	public function registerExtensions( \Discord\Discord $discord ) {

		// Variables for reporting.
		$active   = array();
		$inactive = array();
		
		// Get all event constants, assume inactive at this time.
		$event_constants = $this->getEventConstants();
		foreach( $event_constants as $event_constant ) {

			// Get interface name that corresponds to $event_constant.
			$interface_name = $this->getInterfaceName( $event_constant );

			// Get all extensions that implement interface_name.
			$extensions = $this->getImplementors(
				"\\Soft321\Discord\Events\\$interface_name"
			);

			// Register extensions, if any, to event.
			if( !empty( $extensions ) ) {

				// Get the function that corresponds to $event_constant.
				$function_name  = $this->getFunctionName( $event_constant );

				// Register each event constant to a handler.
				$discord->on(
			
					$event_constant,
					function() use( $extensions, $function_name ) {

						// Get the arguments passed.
						$args = func_get_args();
					
						// Unset the NULL argument.
						if( ( $null_index = array_search( NULL, $args ) ) !== false ) {
							unset( $args[ $null_index ] );
						}

						// Call each extension with $args.
						foreach( $extensions as $extension ) {

							$extension->$function_name( ...$args );

						}

					}

				);

				$active[ $event_constant ] = array_map(
					function( $val ) { return get_class( $val ); },
					$extensions
				);

			} else {
				
				$inactive[] = $event_constant;
				
			}

		}

		// Display nice CLI output of active / inactive events.
		$out_fmt = "%d %s events: [%s";
		printf( $out_fmt, count( $active ), 'active', PHP_EOL );
		$out_fmt   = "%4s%s => [%s%8s%s%s%4s]%s";
		foreach( $active as $key => $val ) {
			printf(
				$out_fmt, ' ', $key, PHP_EOL, ' ', implode( ', ' . PHP_EOL, $val ),
				PHP_EOL, ' ', PHP_EOL
			);
		}
		echo "]";
		echo PHP_EOL . PHP_EOL;
		$out_fmt = "%d %s events: [ %s ]";
		printf( $out_fmt, count( $inactive ), 'inactive', implode( ', ', $inactive ) );
		echo PHP_EOL . PHP_EOL;

	}

	protected function getEventConstants() {

		// Get all events.
		$mirror          = new \ReflectionClass( '\Discord\WebSockets\Event' );
		$event_constants = array_keys( $mirror->getConstants() );
		// Ignore the 'READY' event.
		return array_diff( $event_constants, [ 'READY' ] );

	}

	protected function getInterfaceName( $event_constant ) {
		
		return implode(
			'',
			array_map(
				'ucfirst',
				array_map( 'strtolower', explode( '_', $event_constant ) )
			)
		);
		
	}

	protected function getFunctionName( $event_constant ) {
		
		return strtolower( $event_constant );
		
	}

	protected function getImplementors( $interface_name ) {

		$classes = array_filter(
			$this->meta_extensions,
			function( $val ) use( $interface_name ) {

				return $val->implementsInterface( $interface_name );
			
			}
		);
		$objects = array_map(
			function( $val ) { return $val->newInstance(); },
			$classes
		);
		return $objects;

	}

}

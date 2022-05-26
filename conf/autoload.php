<?php

// Autoload 3rd party libs.
require 'vendor/autoload.php';

// Autoload project libs.
$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory( 'src' );
$loader->setTempDirectory( 'temp' );
$loader->register();

#
# ExtensionManager.php automagic.
#
$_ENV[ 'PROJECT_ROOT' ] = realpath(__DIR__.'/..');
$_ENV[ 'EXT_DIR' ]      = $_ENV[ 'PROJECT_ROOT' ].'/src/Extensions';

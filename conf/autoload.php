<?php

// Autoload 3rd party libs.
require 'vendor/autoload.php';

// Autoload project libs.
$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory( 'src' );
$loader->setTempDirectory( 'temp' );
$loader->register();

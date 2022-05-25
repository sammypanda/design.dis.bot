<?php

// App-specific environmental data goes here.

#
# MySQL Database
#
$_ENV['DB_DSN']  = 'mysql:unix_socket=/opt/local/var/run/mariadb-10.5/mysqld.sock;';
$_ENV['DB_USER'] = 'root';
$_ENV['DB_PASS'] = 'd3v3l0p++';
$_ENV['PATH_TO_QUERIES'] = $_ENV[ 'PROJECT_ROOT' ].'/src/Library/Database/Queries';

#
# Email Alerts
#
$_ENV[ 'APP_EMAIL' ]     = 'findpager@gmail.com';
$_ENV[ 'APP_EMAIL_DSN' ] = sprintf(
	'gmail+smtp://%s:cwifR5AEd2easvP@default',
	$_ENV[ 'APP_EMAIL' ]
);
$_ENV[ 'ADMIN_EMAIL' ]   = 'lino@321software.net';

#
# Logging to file.
#
$_ENV[ 'LOGPATH' ]       = $_ENV[ 'PROJECT_ROOT' ].'/logs';

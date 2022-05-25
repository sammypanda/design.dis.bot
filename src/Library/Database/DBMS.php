<?php

namespace Soft321\Database;

use \PDO;

class DBMS {

	/**
	 * PDO connection parameters.
	 */
	protected $dsn;
	protected $user;
	protected $pass;
	protected $opts;

	/**
	 * Path to SQL queries on disk.
	 */
	protected $pathToQueries;

	/**
	 * The name of the current database.
	 */
	protected $currentDatabaseName;

	/**
	 * Singleton instance of this class.
	 */
	private static $instance = NULL;

	/**
	 * Singleton method that constructs a new instance of this class if one
	 * does not yet exist.
	 */
	public function __construct($dsn, $user, $pass, $pathToQueries) {

		$this->dsn = $dsn;
		$this->user = $user;
		$this->pass = $pass;
		$this->opts = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			// reduce chances of getting a SQL injection attack, by using this option
			PDO::ATTR_EMULATE_PREPARES => false
		];
		$this->pathToQueries = $pathToQueries;
		$this->currentDatabaseName = null;

	}

	/**
	 * Initialize a new connection to the database if one does not already
	 * exist for $databaseName. PDO does this automatically whenever you use the
	 * ATTR_PERSISTENT option and create a new object. Although multiple PDO
	 * objects may exist in memory, they all share the same DB connection.
	 *
	 * Then, set $databaseName as the default database to use for queries.
	 */
	public function use( $databaseName ) {

		$this->currentDatabaseName = $databaseName;

	}

	/**
	 * Create prepared statement from query.
	 *
	 * @return    The prepared statement corresponding to $queryName.
	 */
	public function getStmt($queryName) {

		// Get the SQL file.
		$sqlFile = sprintf(
			"%s/%s/%s.sql",
			$this->pathToQueries,
		    $this->currentDatabaseName,
		    $queryName
		);
		$sql = file_get_contents($sqlFile);

		// Prepare it, using PDO.
		$dbh = $this->connect( $this->currentDatabaseName );
		return $dbh->prepare( $sql );

	}

	public function connect( $databaseName ) {

		$tempDsn = $this->dsn . "dbname=$databaseName";
		/**
		 * Using try is critical for security. Without it, PHP might show
		 * database passwords in Exception::getMessage();
		 *
		 * DO NOT throw this one upstream.
		 */
		try {
			return new PDO(
				$tempDsn,
				$this->user,
				$this->pass,
				$this->opts
			);
		} catch(\PDOException $e) {

			// Send email alert.
			\Soft321\Services::mail(

				$_ENV[ 'ADMIN_EMAIL' ],
				$e->getMessage(),
				$e->getTraceAsString()

			);
			/**
			 * It will lead to a fatal error by anyone who tries to use it, so the only
			 * thing we can do now is exit the program.
			 */
			exit;

		}

	}

}
<?php
	
		
	define("DSN", "mysql:host=localhost;dbname=claim_database");
    define("USERNAME", "root");
    define("PWD", "");

	class DB
	{

		protected static $con;

		private function __construct()
		{
			try {
	            //Create the connection 
	            self::$con = new PDO(DSN, USERNAME, PWD);
	            //set the PDO error mode to exception
	            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $ex) {
	            //Display error message
	            echo "Connection failed ".$ex->getMessage();
        	}

		}
		public static function getConnection() {

			if (!self::$con) {
				new DB();
			}
			return self::$con;
		}
	}

?>
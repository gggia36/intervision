<?php
/*class DB{
	private static $instance = NULL;

	private function __construct() {}
	private function __clone(){}

	public function __destruct(){
		//echo "DB Connection End";
	}

	public static function getInstance() {

		if (!self::$instance){
			$config = Config::get();

			try{
				$dsn = 'mysql:host='.$config->db_server.';dbname='.$config->db_name.';';
				$attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
				self::$instance = new PDO($dsn, $config->db_user, $config->db_password, $attr);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				throw new SQLException($e->getMessage());
				exit();
			}
		}

		return self::$instance;
	}


}*/

//include_once('adodb/adodb.inc.php');
//include_once('adodb/adodb-exceptions.inc.php');

class DB2{
	private static $instance = NULL;

	private function __construct() {}
	private function __clone(){}

	public function __destruct(){
		//echo "DB Connection End";
	}

	public static function getInstance() {

		if (!self::$instance){

			try{

				// self::$instance = ADONewConnection('mysqli');
				// self::$instance->Connect(Config::get()->db_server, Config::get()->db_user, Config::get()->db_password, Config::get()->db_name);
				// self::$instance->SetFetchMode(ADODB_FETCH_ASSOC);
				// self::$instance->Execute('SET NAMES utf8');

        $base = Base::getInstance();
        $server = $base->get('SERVER');
    	$user = $base->get('DB_USER');
    	$password = $base->get('DB_PASSWORD');
    	$database = $base->get('DB_NAME');
        $prefix = $base->get('DB_PREFIX');

        $database = new Medoo(array(
        	// required
        	'database_type' => 'mysql',
        	'database_name' => $database,
        	'server' => $server,
        	'username' => $user,
        	'password' => $password,
        	'charset' => 'utf8',

        	// [optional]
        	'port' => 3306,

        	// [optional] Table prefix
        	'prefix' => $prefix,

        	// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        	'option' => array(
        		PDO::ATTR_CASE => PDO::CASE_NATURAL,
            	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        	)
        ));
        self::$instance = $database;

			}catch(PDOException $e){
        		throw new SQLException($e->getMessage());
        		//echo $e->getMessage();
				exit();
			}
		}

		return self::$instance;
	}

}

?>

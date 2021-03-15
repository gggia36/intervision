<?php
 class DB {
 	private static $instance = false;
 	public static function getInstance() {
	    if (!self::$instance) {
	      self::$instance = new DB();
	    }

	    return self::$instance;
	}
	
	private function _connectMySQL(){
		
		$base = Base::getInstance();
		
		include_once($base->get('BASEDIR').'/assets/libs/adodb/adodb.inc.php');
		$db = ADONewConnection('mysqli'); 

		$server = $base->get('SERVER');
		$user = $base->get('DB_USER');
		$password = $base->get('DB_PASSWORD');
		$database = $base->get('DB_NAME');
		

		 
		$db->Connect($server,$user,$password,$database) or die('No Select Database');
		$db->Execute('SET NAMES utf8');
		return $db;
	}
	public function condb(){
		$resultreturn = $this->_connectMySQL();
		return $resultreturn;
	}
	
 }
?>
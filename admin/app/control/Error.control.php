<?php
 class Error {
 	
 	public function Fail404(){
		Template::getInstance()->render('error/404.htm');
	}
	public function FailPermission(){
		Template::getInstance()->render('error/nopermission.htm');
	}
 	
 }
?>
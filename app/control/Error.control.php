<?php
 class Error {
 	
 	public function Fail404(){
		
		Template::getInstance()->pagecontent = 'error/404.htm';
		Template::getInstance()->render('layout.htm');
	}
	public function FailPermission(){
		Template::getInstance()->render('error/nopermission.htm');
	}
 	
 }
?>
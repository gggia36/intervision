<?php
 class Auth {
 	
 	public function noroute(){
		
	}
 	
 	public function authen($base){
 		
		Template::getInstance()->render('login/login.htm');
	}
	
	public function login($base){
		//GF::print_r("A");
		$username = $base->get('POST.vc_username');
		$password = $base->get('POST.vc_password');
		
		$authen = new Authen();
		echo $authen->accessLogin();
		//GF::print_r($authen->accessLogin());
	}
	public function logout($base){
		$authen = new Authen();
		$authen->accessLogout();
		echo '<script>window.location = "'.$base->get('BASEURL').'";</script>';
	}
 	
 }
?>
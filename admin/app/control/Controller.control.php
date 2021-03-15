<?php
 class Controller {
 	
 	public function beforeroute($base){
 		
		$auth = new Authen();
		$validate = $auth->validateLogin();
		if(!$validate){
			Template::getInstance()->render('login/login.htm');
			exit();
		}else{
			$member = new Member();
			
			$base->set('memberinfo',$member->memberInfomation());
			$base->set('langmode',NULL);
			
			$module = new Module();
			$base->set('langlist',$module->languageList());
			
		}
		
	}
 }
?>
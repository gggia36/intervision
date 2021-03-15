<?php
 class Platform {
 	
	public function indexsite(){
 		$base = Base::getInstance();


 		$base->set('active_platform','current-menu-item');
 		Template::getInstance()->pagecontent = 'platform/platform.htm';
		Template::getInstance()->render('layout.htm');

	} 

	
 }
?>
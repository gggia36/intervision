<?php
 class Home {
 	
 	
 	
 	public function homepage(){
 		$base = Base::getInstance();
		
		$module = new Module();
		$moduleList = $module->moduleListByPermission();
		
		$base->set('moduleList',$moduleList);
		
		Template::getInstance()->render('layout.htm');
	}
 	
 }
?>
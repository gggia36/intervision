<?php
 class Controller {
 	public function beforeroute($base){
 		$base = Base::getInstance();
 		$detect = new Mobile_Detect;

 		if($_SESSION['language']=='en'){
 			$data_lang = 'th';
 		}else{
 			$data_lang = 'en';
 		}

 		

 		
 
 		
 		$base->set('data_lang',$data_lang);

 		$base->set('detect',$detect);



	}

 }
?>
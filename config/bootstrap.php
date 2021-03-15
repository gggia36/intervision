<?php
/*   function __autoload($class_name) {
	   	$base = Base::getInstance();
	   	$allpath = $base->bootAutoLoad();
	   	foreach($allpath as $pathclass){
			require_once $base->get('BASEDIR').$pathclass."/".$class_name . '.class.php';
		}
	    
	}*/
	function autoload_class_multiple_directory($class_name) 
	{

	    $base = Base::getInstance();
	   	$allpath = $base->bootAutoLoad();

	    foreach($allpath as $pathclass){
	       if($pathclass=='/app/control'){
			   	if(is_file($base->get('BASEDIR').$pathclass."/".$class_name . '.control.php')){
		            include_once $base->get('BASEDIR').$pathclass."/".$class_name . '.control.php';
		        } 
		   }else{
		   		if(is_file($base->get('BASEDIR').$pathclass."/".$class_name . '.class.php'))  {
		            include_once $base->get('BASEDIR').$pathclass."/".$class_name . '.class.php';
		        } 
		   }
	        

	    }
	}
	spl_autoload_register('autoload_class_multiple_directory');
?>
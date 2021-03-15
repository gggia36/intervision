<?php
	session_start();
	ob_start();
	error_reporting(0);
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	if(empty($_SESSION['language'])){
		$_SESSION['language'] = 'en';
	}

    $base->config("SERVER", 'localhost');
	$base->config("DB_USER", 'visionho_intervision');
	$base->config("DB_PASSWORD", 'A1DUlb(nCVx[');
	$base->config("DB_NAME", 'visionho_intervision');

	
	$base->config("TITLE","Intervision.co");
	$base->config("DESC","Intervision.co");
	$base->config("KEYWORD","Intervision.co");
	
	$base->config("PROJECTFD","");
	$base->config("TEMPLATE","event");


	$base->config("WEBURL","https://".$_SERVER['SERVER_NAME'].$base->get('PROJECTFD').'/'.$_SESSION['language']); 
 
	$base->config("BASEURL","https://".$_SERVER['SERVER_NAME'].$base->get('PROJECTFD')); 

	$base->config("BASEDIR",$_SERVER['DOCUMENT_ROOT'].$base->get('PROJECTFD'));
	$base->config("VIEWPATH",$_SERVER['DOCUMENT_ROOT'].$base->get('PROJECTFD')."/app/view/".$base->get('TEMPLATE')."/");

	
	
		
	// $base->config("MAIL_USERNAME", 'sales@mandalasystem.com');
	// $base->config("MAIL_PASSWORD", 'MandalaSales9988*!');
	// $base->config("MAIL_HOST", 'smtp.gmail.com');
	// $base->config("MAIL_UDEBUG", 0);
	// $base->config("MAIL_PORT", 587);

	// $base->config("ADMIN_EMAIL","sales@mandalasystem.com"); 
	// $base->config("ADMIN_NAME","Mandala");
	
	// $base->config("SYSTEM_EMAIL","sales@mandalasystem.com"); 
	// $base->config("SYSTEM_NAME","Mandala");
	
	// $base->config("EMAIL_FROM","sales@mandalasystem.com"); 
	// $base->config("EMAIL_FROM_NAME","Mandala");
	   

?>
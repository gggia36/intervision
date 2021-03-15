<?php
	session_start();
	ob_start();
    error_reporting(E_WARNING);

    $base->config("SERVER", 'localhost');
	$base->config("DB_USER", 'visionho_intervision');
	$base->config("DB_PASSWORD", 'A1DUlb(nCVx[');
	$base->config("DB_NAME", 'visionho_intervision');



	$base->config("TITLE","Intervision Admin Management");
	$base->config("PROJECTFD_F","");
	$base->config("PROJECTFD","admin");
	$base->config("TEMPLATE","ocean");

	$base->config("EDITOR_PATH","uploads/images");

	$base->config("BASEURL","https://".$_SERVER['SERVER_NAME'].'/'.$base->get('PROJECTFD'));
	$base->config("BASEURL_F","https://".$_SERVER['SERVER_NAME'].'/'.$base->get('PROJECTFD_F'));

	$base->config("BASEDIR",$_SERVER['DOCUMENT_ROOT']."/".$base->get('PROJECTFD'));

	$base->config("BASEDIR_F",$_SERVER['DOCUMENT_ROOT']."/".$base->get('PROJECTFD_F'));

	$base->config("VIEWPATH",$_SERVER['DOCUMENT_ROOT']."/".$base->get('PROJECTFD')."/app/view/".$base->get('TEMPLATE')."/");
	

 //    $base->config("MAIL_USERNAME", '');
	// $base->config("MAIL_PASSWORD", '');
	// $base->config("MAIL_HOST", 'smtp.gmail.com');
	// $base->config("MAIL_UDEBUG", 0);
	// $base->config("MAIL_PORT", 587);

	///// Config for plugin ////////
	/*$cf_base = array();*/

	/*$cf_base['PROJECTFD'] = $base->get('PROJECTFD');
	$cf_base['PROJECTFD_F'] = $base->get('PROJECTFD_F');

	$cf_base['BASEURL'] = $base->get('BASEURL');
	$cf_base['BASEURL_F'] = $base->get('BASEURL_F');

	$cf_base['BASEDIR'] = $base->get('BASEDIR');
	$cf_base['BASEDIR_F'] = $base->get('BASEDIR_F');*/


?>

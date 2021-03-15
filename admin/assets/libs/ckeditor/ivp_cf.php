<?php

	$path_nmae = $base->get('BASEDIR_F');
	$pathurl = $base->get('BASEURL_F');
	//echo $pathurl;
	define("EDITORP","/backoffice/assets/libs/ckeditor"); //do not insert / first leter word and last leter word
	
 	define("BASEDIR",$path_nmae."/".EDITORP."/");
	//define("BASEFD",$_SERVER['DOCUMENT_ROOT']."/ivp_editor/");
	define("IMAGEURL",$pathurl."/uploads/editor_upload/");
    define("PATHUPLOAD",$path_nmae."/uploads/editor_upload");
    define("ENDPATH","editor_upload");
    echo IMAGEURL."ddddddd";
?>
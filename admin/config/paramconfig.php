<?php
/*****************************************************************************|
| Intervision CMS
|--------------------------------------------------------------------------------------------------------------------------------------
| Copyright ? 2011 Inter Vision Professional Co., Ltd.
| All rights reserved.
|--------------------------------------------------------------------------------------------------------------------------------------
| Website : www.intervisionpro.com
| Email : admin@intervisionpro.com
| Tel. : +66-2-714-5888 Fax : +66-2-714-5785
+-------------------------------------------------------------------------------------------------------------------------------------
/***************************************************************************/
error_reporting(E_ALL ^E_NOTICE);
// ===================== CONFIGURATION =================================
define("PROJECT_FLODER", "/tcc"); //if not .demo.com : intercms
define("PROJECT_NAME", "INTERVISION CMS");
define("PROJECT_BACKPATH", "/backoffice");

define('SERVER', 'localhost');

define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tcc');


// ================= CONFIG PARAM FRONT ================================
$config['domain'] 				= $_SERVER['SERVER_NAME'];
$config['documentroot'] 		= $_SERVER['DOCUMENT_ROOT'];
$config['basedir'] 				= $config['documentroot'].PROJECT_FLODER;
$config['baseurl'] 				= 'https://'.$config['domain'].PROJECT_FLODER;
$config['baseurl_img'] 			=  $config['baseurl'].'/imgs_system';

$config['system_name'] 			=  PROJECT_NAME;


// ================= CONFIG PARAM BACK ================================
$config['basedir_admin'] 		= $config['basedir'].PROJECT_BACKPATH;
$config['baseurl_admin'] 		= $config['baseurl'].PROJECT_BACKPATH;

$config['system_name_admin'] 	= PROJECT_NAME;
$config['email_system_name_sended'] 	= "";



// ================= SMARTY INCLUDE ===================================
require_once($config['basedir_admin'].'/fwlibs/smarty/libs/Smarty.class.php');
require_once($config['basedir_admin'].'/fwlibs/classes/mysmarty.class.php');
require_once($config['basedir_admin'].'/fwlibs/classes/SConfig.php');
require_once($config['basedir_admin'].'/fwlibs/classes/SError.php');
require_once($config['basedir_admin'].'/fwlibs/classes/SEmail.php');
?>
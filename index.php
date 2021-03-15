<?php

 require("app/model/Base.class.php");
  
 $base = Base::getInstance();
 require("config/init.php");
 require("route.php");
 require("config/bootstrap.php");
 require_once'Mobile/Mobile_Detect.php';

 
 include_once('assets/paginator/paginator.php'); 
 include_once('assets/paginator/paginator_html.php');

 if(empty($_SESSION['language'])){
 	$_SESSION['language'] = 'en';
 }

 

 $base->run();
 

 
?>
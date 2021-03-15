<?php
date_default_timezone_set('Asia/Bangkok');

 require("app/model/Base.class.php");
  
 $base = Base::getInstance();
 require("config/init.php");
 require("route.php");
 require("config/bootstrap.php");
 
 require("jsfile.php");
 //GF::print_r($base->get("VIEWPATH"));
 
 $base->run();
 
?>
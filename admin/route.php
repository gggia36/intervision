<?php
/*

	Copyright (c) 2015 Intervision Bussiness Group, All rights reserved.

	Creator By BIRD [SUPHAN]

*/

	/**
	*	Route File auto select controller
	*	@How to
	*	$base->ROUTE('AUTOLOAD','/app/model;/app/control',NULL); --> user for autoload class file
	*	$base->ROUTE('GET','mypath','Dashboard->home'); --> First parameter fill method GET ,POST or AJAX(For ajax request)
	*   Second parameter fill path format,
	*   $base->ROUTE('GET','home/test/@id/','Home->@id'); --> use @ before varible this varible will be set in funtion $base->set('id','value');
	*   Third parameter fill class and method controller.
	**/

	$base->ROUTE('AUTOLOAD','/app/model;/app/control',NULL);

	$base->ROUTE('GET','','Home->homepage');
	$base->ROUTE('GET','auth','Auth->authen');
	$base->ROUTE('GET','logout','Auth->logout');
	$base->ROUTE('GET','ordercron','Cronjoborder->ordercron');
	$base->ROUTE('AJAX','logout','Auth->logout');
	$base->ROUTE('AJAX','auth/login/','Auth->login');
	$base->ROUTE('AJAX','dashboard','Dashboard->home');
	$base->ROUTE('AJAX','dashboard/profile/@userid/','Dashboard->profile');

	/*---------------------User ROUTE---------------------*/
	$base->ROUTE('AJAX','user/@modname/','User->@modname');
	$base->ROUTE('POST','user/@modname/','User->@modname');
	$base->ROUTE('AJAX','user/@modname/@userid/','User->@modname');
	
	/*---------------------Content ROUTE---------------------*/
	$base->ROUTE('AJAX','content/@modname/','Content->@modname');
	$base->ROUTE('POST','content/@modname/','Content->@modname');
	$base->ROUTE('AJAX','content/@modname/@ids/','Content->@modname');


	/*------------Setting ROUTE---------------------*/
	//$base->ROUTE('AJAX','setting/','Expenses->expenseslist');
	$base->ROUTE('POST','setting/@modname/','Setting->@modname');
	$base->ROUTE('AJAX','setting/@modname/','Setting->@modname');
	$base->ROUTE('AJAX','setting/@modname/@ids/','Setting->@modname');


    /*---------------------Article ROUTE---------------------*/
	$base->ROUTE('AJAX','news/@modname/','Article->@modname');
	$base->ROUTE('POST','news/@modname/','Article->@modname');
	$base->ROUTE('AJAX','news/@modname/@ids/','Article->@modname');


	/*---------------------Utility ROUTE---------------------*/
	$base->ROUTE('AJAX','js/@modname/@action/','Utility->javascript');

	$base->ROUTE('AJAX','utility/@modname/','Utility->@modname');
	$base->ROUTE('POST','utility/@modname/','Utility->@modname');





?>

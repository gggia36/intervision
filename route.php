<?php

	$base->ROUTE('AUTOLOAD','/app/model;/app/control',NULL);
//-----------------------------------------  HOME ROUTE--------------------------------------------//	
	$base->ROUTE('GET','','Home->indexsite');
	$base->ROUTE('GET','home','Home->indexsite');
	$base->ROUTE('GET','index.php','Home->indexsite');
	$base->ROUTE('AJAX','home/change_lang','Home->change_lang');

	$base->ROUTE('GET','partner','Partner->indexsite');

	$base->ROUTE('GET','platform','Platform->indexsite');

	$base->ROUTE('GET','blog','Blog->indexsite');

	$base->ROUTE('GET','blog_all','Blog->blogall');

	$base->ROUTE('AJAX','blog/blog_search','Blog->blog_search');

	$base->ROUTE('AJAX','blog/change_lang','Blog->change_lang');

	$base->ROUTE('GET','blog/category/@ids/@name/','Blog->blog_category');

	$base->ROUTE('GET','blog/@ids/@name/','Blog->blog_detail');

	$base->ROUTE('GET','services/@ids/@name/','Usecases->usecases_detail');

	$base->ROUTE('GET','comingsoon','Home->comingsoon');

	$base->ROUTE('GET','about-us','Home->about_us');

	$base->ROUTE('GET','contact-us','Home->contact_us');

	$base->ROUTE('AJAX','contact-us/sendmail/','Home->sendmail');

	$base->ROUTE('GET','news','Blog->news');

	$base->ROUTE('GET','blog_all','Blog->blogall');

	$base->ROUTE('GET','blog_new','Blog->blognew');

	$base->ROUTE('GET','blog_digital','Blog->blogdigital');

	$base->ROUTE('GET','blog_e-com','Blog->blogEcom');

	$base->ROUTE('GET','blog_events','Blog->blogevent');

	$base->ROUTE('GET','blog_detail','Blog->blogdetail');

	$base->ROUTE('GET','terms','Home->terms');

	$base->ROUTE('GET','privacy','Home->privacy');


?>
<?php
 class Home {
 	
	public function indexsite(){
 		$base = Base::getInstance();
 		$home = new SHome;

 		$detect = $base->get('detect');



 		// $news_list = $home->news_list(); 

 		// $base->set('news_list',$news_list);

 		$lang = $_SESSION['language'];
 		if($lang == 'th'){

 			$title = 'บริการพัฒนาซอฟต์แวร์ web, E-Commerce development, Warehouse Management System';
 			$_desc = 'เราให้บริการพัฒนาซอฟต์แวร์ Web, E-commerce, POS, Stock, Warehouse Management System, Online e-learning, Booking System';
 			$_keyword = 'web, บริการพัฒนาซอฟต์แวร์, e-commerce, warehouse management system, online';
 			$_lang = 'th';
 			$_url_lang = 'th_TH';
			$_url_title = 'บริการพัฒนาซอฟต์แวร์ web, E-Commerce development, Warehouse Management System';
			$_url_title_des = 'เราให้บริการพัฒนาซอฟต์แวร์ Web, E-commerce, POS, Stock, Warehouse Management System, Online e-learning, Booking System';
			$_url = 'https://www.intervision.co/th/';


			

			

 		}else{
 			$title = 'Custom Web Software Development, E-Commerce, Warehouse Management System';
 			$_desc = 'We provide custom software development services for Web, E-commerce, POS, Stock, Warehouse Management System, Online e-learning, Booking System';
			$_keyword = 'web, custom software development, e-commerce, warehouse management system, online';
			$_lang = 'en';
			$_url_lang = 'en_US';
			$_url_title = 'Custom Web Software Development, E-Commerce, Warehouse Management System';
			$_url_title_des = 'We provide custom software development services for Web, E-commerce, POS, Stock, Warehouse Management System, Online e-learning, Booking System';
			$_url = 'https://www.intervision.co/en/';

			

 		}
 		
 		$base->set('TITLE',$title);
		$base->set('DESC',$_desc);
		$base->set('KEY',$_keyword);
		$base->set('LANG',$_lang);
		$base->set('LINK_EN',"https://www.intervision.co/en/");
		$base->set('LINK_TH',"https://www.intervision.co/th/");
		$base->set('LINK',"https://www.intervision.co/");
		$base->set('IMG_SHARE',"https://intervision.co/assets/images/custom-web-software-development-share.jpg");
		$base->set('url_lang',$_url_lang);
		$base->set('url_title',$_url_title);
		$base->set('url_title_des',$_url_title_des);
		$base->set('url',$_url);


		if ( $detect->isMobile() ) {

			Template::getInstance()->pagecontent = 'home/home-mobile.htm';
		}else{
			
			Template::getInstance()->pagecontent = 'home/home.htm';
		}
 		
		Template::getInstance()->render('layout.htm');

	} 

	public function comingsoon(){
 		$base = Base::getInstance();


 		Template::getInstance()->pagecontent = 'comingsoon/comingsoon.htm';
		Template::getInstance()->render('layout_coming.htm');

	} 

	public function terms(){
 		$base = Base::getInstance();

 		$base->set('TITLE','Terms and Conditions :: Intervision.co');
		$base->set('DESC','Terms and Conditions :: Intervision.co');
 		


 		Template::getInstance()->pagecontent = 'home/terms.htm';
		Template::getInstance()->render('layout.htm');

	} 
	public function privacy(){
 		$base = Base::getInstance();

 		$base->set('TITLE','Privacy Policy :: Intervision.co');
		$base->set('DESC','Privacy Policy :: Intervision.co');


 		Template::getInstance()->pagecontent = 'home/privacy.htm';
		Template::getInstance()->render('layout.htm');

	} 


	public function about_us(){
 		$base = Base::getInstance();

 		$lang = $_SESSION['language'];
 		if($lang == 'th'){

 			$title = 'เกี่ยวกับเรา Intervision.co ให้บริการโซลูชั่นการพัฒนาซอฟต์แวร์';
 			$_desc = 'เพื่อเป็นพันธมิตรนวัตกรรมซอฟต์แวร์ที่น่าเชื่อถือและเป็นที่ต้องการมากที่สุดสำหรับ Startups, SMBs และ Enterprises ทั่วโลก!'; //เหมือนความหมายไม่เข้ากันกับ EN
 			$_keyword = 'เกี่ยวกับเรา, intervision, นวัตกรรมซอฟต์แวร์, startups, enterprises, ทั่วโลก, พัฒนาซอฟต์แวร์';
 			$_lang = 'th';
 			$_url_lang = 'th_TH';
			$_url_title = 'เกี่ยวกับเรา Intervision.co ให้บริการโซลูชั่นการพัฒนาซอฟต์แวร์';
			$_url_title_des = 'เพื่อเป็นพันธมิตรนวัตกรรมซอฟต์แวร์ที่น่าเชื่อถือและเป็นที่ต้องการมากที่สุดสำหรับ Startups, SMBs และ Enterprises ทั่วโลก!';
			$_url = 'https://www.intervision.co/th/about-us/';


			

			

 		}else{
 			$title = 'About Us :: Intervision.co :: Custom Software Development';
 			$_desc = 'To become the most trusted and preferred software innovation partner for Startups, SMBs and Enterprises. Globally!';
			$_keyword = 'about us, custom software development, innovation, partner, startups, enterprises, globally';
			$_lang = 'en';
			$_url_lang = 'en_US';
			$_url_title = 'About Us :: Intervision.co :: Custom Software Development';
			$_url_title_des = 'To become the most trusted and preferred software innovation partner for Startups, SMBs and Enterprises. Globally!';
			$_url = 'https://www.intervision.co/en/about-us/';

			

 		}

 		$base->set('TITLE',$title);
		$base->set('DESC',$_desc);
		$base->set('KEY',$_keyword);
		$base->set('LANG',$_lang);
		$base->set('LINK_EN',"https://www.intervision.co/en/about-us/");
		$base->set('LINK_TH',"https://www.intervision.co/th/about-us/");
		$base->set('LINK',"https://www.intervision.co/about-us/");
		$base->set('IMG_SHARE',"https://intervision.co/assets/images/about-share.jpg");
		$base->set('url_lang',$_url_lang);
		$base->set('url_title',$_url_title);
		$base->set('url_title_des',$_url_title_des);
		$base->set('url',$_url);



 		Template::getInstance()->pagecontent = 'home/about-us.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function contact_us(){
 		$base = Base::getInstance();

 		$lang = $_SESSION['language'];
 		if($lang == 'th'){
 			$title = 'ติดต่อเรา Intervision.co';
 			$_desc = 'ติดต่อเรา Intervision.co'; //เหมือนความหมายไม่เข้ากันกับ EN
 			$_keyword = 'ติดต่อเรา, contact, sales team, intervision, facebook, line';
 			$_lang = 'th';
 			$_url_lang = 'th_TH';
			$_url_title = 'ติดต่อเรา Intervision.co';
			$_url_title_des = 'ติดต่อเรา Intervision.co';
			$_url = 'https://www.intervision.co/th/contact-us/';


			

			

 		}else{
 			$title = 'Contact Us :: Intervision.co';
 			$_desc = 'Become an lnter Vision Partner. Open a new stream of revenue. Inter Vision Partner program lets you earn
incentives for bringing new business.';
			$_keyword = 'contact us, sales team, intervision, facebook, line';
			$_lang = 'en';
			$_url_lang = 'en_US';
			$_url_title = 'Contact Us :: Intervision.co';
			$_url_title_des = 'Contact Us :: Intervision.co';
			$_url = 'https://www.intervision.co/en/contact-us/';

			

 		}
 		$base->set('TITLE',$title);
		$base->set('DESC',$_desc);
		$base->set('KEY',$_keyword);
		$base->set('LANG',$_lang);
		$base->set('LINK_EN',"https://www.intervision.co/en/contact-us/");
		$base->set('LINK_TH',"https://www.intervision.co/th/contact-us/");
		$base->set('LINK',"https://www.intervision.co/contact-us/");
		$base->set('IMG_SHARE',"https://intervision.co/assets/images/contact-share.jpg");
		$base->set('url_lang',$_url_lang);
		$base->set('url_title',$_url_title);
		$base->set('url_title_des',$_url_title_des);
		$base->set('url',$_url);

 		Template::getInstance()->pagecontent = 'home/contact-us.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function sendmail(){
 		$base = Base::getInstance();

 		$parampost = $base->get('POST');

 		if(!empty($parampost)){

 			$firstname = $parampost['firstname'];
 			$lastname = $parampost['lastname'];
 			$business_email = $parampost['business_email'];
 			$company = $parampost['company'];
 			$phone = $parampost['phone'];
 			$title = $parampost['title'];
 			$optional = $parampost['optional'];

 			$subject = 'Contact Us : Mandala';
			$msgHtml = '<p>Name: '.$firstname.' '.$lastname.'</p>';
			$msgHtml .= '<p>Business Email Address: '.$business_email.'</p>';
			$msgHtml .= '<p>Company: '.$company.'</p>';
			$msgHtml .= '<p>Phone Number: '.$phone.'</p>';
			$msgHtml .= '<p>Title: '.$title.'</p>';
			$msgHtml .= '<p>Additional Information (Optional): '.$optional.'</p>';

			$sendmail = Mailer::getInstance();

			// $sendmail->setFromEmail = '';
			// $sendmail->setFromName = 'mandalasystem.com';

			// $sendmail->addAddressEmail = 'sales@mandalasystem.com'; //DAtabase
			// $sendmail->addAddressName = $firstname.' '.$lastname;
			// $sendmail->Subject =  $subject;
			// $sendmail->msgBody = $msgHtml;
			// $sendmail->Body = $msgHtml;
			// $sendmail->sendMail();

			echo '1';

 		}


	} 

	public function change_lang(){
 		$base = Base::getInstance();

 		$url_req = $base->get('POST.url_req');
		
		$_SESSION['language'] = $base->get('POST.data_lang');

		if($_SESSION['language']=='en'){
			$url_req = str_replace('th', 'en', $url_req);
		}else{
			$url_req = str_replace('en', 'th', $url_req);	
		}
		
		echo $url_req;
 		

	}

	
 }
?>
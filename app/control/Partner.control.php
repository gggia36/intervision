<?php
 class Partner {
 	
	public function indexsite(){
 		$base = Base::getInstance();
 		$lang = $_SESSION['language'];
 		if($lang == 'th'){
 			$partner = 'ร่วมเป็นพันธมิตรกับ Inter Vision Partner Program';
 			$_desc = 'ร่วมเป็นพันธมิตรกับ Inter Vision Partner Program เราเน้นความสำคัญกับการบริการและแก้ไขปัญหาของลูกค้า และเราต้องการพาพาร์ทเนอร์ของเราก้าวไปอีกระดับสู่ความสำเร็จ';
 			$_keyword = 'พันธมิตร, Inter Vision Partner Program, บริการ, แก้ไขปัญหา, ลูกค้า, พาร์ทเนอร์, ความสำเร็จ';
 			$_lang = 'th';
 			$_url_lang = 'th_TH';
			$_url_title = 'ร่วมเป็นพันธมิตรกับ Inter Vision Partner Program';
			$_url_title_des = 'ร่วมเป็นพันธมิตรกับ Inter Vision Partner Program เราเน้นความสำคัญกับการบริการและแก้ไขปัญหาของลูกค้า และเราต้องการพาพาร์ทเนอร์ของเราก้าวไปอีกระดับสู่ความสำเร็จ';
			$_url = 'https://www.intervision.co/th/partner/';


			

			

 		}else{
 			$partner = 'Become an lnter Vision Partner :: Intervision.co';
 			$_desc = 'Become an lnter Vision Partner. Open a new stream of revenue. Inter Vision Partner program lets you earn
incentives for bringing new business.';
			$_keyword = 'inter vision partner, revenue, earn incentives, partnership, business';
			$_lang = 'en';
			$_url_lang = 'en_US';
			$_url_title = 'Become an lnter Vision Partner :: Intervision.co';
			$_url_title_des = 'Become an lnter Vision Partner. Open a new stream of revenue. Inter Vision Partner program lets you earn incentives for bringing new business.';
			$_url = 'https://www.intervision.co/en/partner/';

			

 		}
 		
 		$base->set('TITLE',$partner);
		$base->set('DESC',$_desc);
		$base->set('KEY',$_keyword);
		$base->set('LANG',$_lang);
		$base->set('LINK_EN',"https://www.intervision.co/en/partner/");
		$base->set('LINK_TH',"https://www.intervision.co/th/partner/");
		$base->set('LINK',"https://www.intervision.co/partner/");
		$base->set('IMG_SHARE',"https://intervision.co/assets/images/partner-share.jpg");
		$base->set('url_lang',$_url_lang);
		$base->set('url_title',$_url_title);
		$base->set('url_title_des',$_url_title_des);
		$base->set('url',$_url);





 		// $base->set('active_plans','current-menu-item');
 		Template::getInstance()->pagecontent = 'partner/partner.htm';
		Template::getInstance()->render('layout.htm');

	} 
	

 }

?>
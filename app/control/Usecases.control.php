<?php
 class Usecases {
 	
	public function usecases_detail(){
 		$base = Base::getInstance();



 		$usecase_id = $base->get('_ids');

 		if($usecase_id==1){
 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการที่ปรึกษาการเปลี่ยนแปลงแบบดิจิทัล Digital Transformation Consultant Service ปรับปรุงระบบซอฟต์แวร์';
		 			$_desc = 'บริการที่ปรึกษาการเปลี่ยนแปลงแบบดิจิทัล Digital Transformation Consultant Service ให้แบรนด์ใช้ประโยชน์จากเทคโนโลยีดิจิตอล รองรับการเปลี่ยนแปลงทางธุรกิจและสร้างประสบการณ์ที่ดีให้กับลูกค้า';
		 			$_keyword = 'digital transformation, consultant service, ที่ปรึกษา, ปรับปรุงระบบ, ซอฟต์แวร์';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการที่ปรึกษาการเปลี่ยนแปลงแบบดิจิทัล Digital Transformation Consultant Service ปรับปรุงระบบซอฟต์แวร์';
					$_url_title_des = 'บริการที่ปรึกษาการเปลี่ยนแปลงแบบดิจิทัล Digital Transformation Consultant Service ให้แบรนด์ใช้ประโยชน์จากเทคโนโลยีดิจิตอล รองรับการเปลี่ยนแปลงทางธุรกิจและสร้างประสบการณ์ที่ดีให้กับลูกค้า';
					$_url = 'https://www.intervision.co/th/services/1/Digital-Transformation-Consultant-Service/';


					

					

		 		}else{
		 			$title = 'Digital Transformation Consultant Service :: Intervision.co';
		 			$_desc = 'Digital transformation is designed to enable brands to fully leverage digital technologies to support business transformation and create impactful customer experience.';
					$_keyword = 'digital transformation, consultant, brand, experience, business';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Digital Transformation Consultant Service :: Intervision.co';
					$_url_title_des = 'Digital transformation is designed to enable brands to fully leverage digital technologies to support business transformation and create impactful customer experience.';
					$_url = 'https://www.intervision.co/en/services/1/Digital-Transformation-Consultant-Service/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/1/Digital-Transformation-Consultant-Service/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/1/Digital-Transformation-Consultant-Service/");
				$base->set('LINK',"https://www.intervision.co/services/1/Digital-Transformation-Consultant-Service/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/digital-Transformation-Consultant-Servicet-share.jpg");
				
 		
 	
 		}else if($usecase_id==2){
 			// $title = 'Web Development for Branding :: Intervision.co';
 			// $desc = 'Web Development for Branding. The perfect start of your future website. Optimized for any devices. SEO Friendly.';
 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาเว็บไซต์สำหรับโปรโมทแบรนด์ Web Development for Branding';
		 			$_desc = 'บริการพัฒนาเว็บไซต์สำหรับโปรโมทแบรนด์ Web Development for Branding The perfect start of your future website. Optimized for any devices. SEO Friendly.';
		 			$_keyword = 'web development, branding, บริการพัฒนาเว็บไซต์, โปรโมทแบรนด์, seo';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาเว็บไซต์สำหรับโปรโมทแบรนด์ Web Development for Branding ';
					$_url_title_des = 'บริการพัฒนาเว็บไซต์สำหรับโปรโมทแบรนด์ Web Development for Branding The perfect start of your future website. Optimized for any devices. SEO Friendly.';
					$_url = 'https://www.intervision.co/th/services/2/web-development-for-branding/';


					

					

		 		}else{
		 			$title = 'Web Development for Branding :: Intervision.co';
		 			$_desc = 'Web Development for Branding. The perfect start of your future website. Optimized for any devices. SEO Friendly.';
					$_keyword = 'web development, branding, website, seo friendly';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Web Development for Branding :: Intervision.co';
					$_url_title_des = 'Web Development for Branding. The perfect start of your future website. Optimized for any devices. SEO Friendly.';
					$_url = 'https://www.intervision.co/en/services/2/web-development-for-branding/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/2/web-development-for-branding/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/2/web-development-for-branding/");
				$base->set('LINK',"https://www.intervision.co/services/2/web-development-for-branding/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/web-development-for-branding-share.jpg");





 		}else if($usecase_id==3){
 			// $title = 'E-Commerce Web Development :: Intervision.co';
 			// $desc = 'We work closely with clients to create customized E-Commerce solutions. Increase profits and make your E-Commerce business thrive.';
 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาเว็บร้านค้าออนไลน์ E-Commerce Web Development';
		 			$_desc = 'บริการพัฒนาเว็บร้านค้าออนไลน์ E-Commerce Web Development การพัฒนาแพลตฟอร์มอีคอมเมิร์ซแบบเต็มรูปแบบ';
		 			$_keyword = 'customized e-commerce, web development, solution, e-commerce, business';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาเว็บร้านค้าออนไลน์ E-Commerce Web Development';
					$_url_title_des = 'บริการพัฒนาเว็บร้านค้าออนไลน์ E-Commerce Web Development การพัฒนาแพลตฟอร์มอีคอมเมิร์ซแบบเต็มรูปแบบ';
					$_url = 'https://www.intervision.co/th/services/3/e-commerce-web-development/';	

		 		}else{
		 			$title = 'E-Commerce Web Development :: Intervision.co';
		 			$_desc = 'We work closely with clients to create customized E-Commerce solutions. Increase profits and make your E-Commerce business thrive.';
					$_keyword = 'customized e-commerce, web development, solution, e-commerce, business';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'E-Commerce Web Development :: Intervision.co';
					$_url_title_des = 'We work closely with clients to create customized E-Commerce solutions. Increase profits and make your E-Commerce business thrive.';
					$_url = 'https://www.intervision.co/en/services/3/e-commerce-web-development/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/3/e-commerce-web-development/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/3/e-commerce-web-development/");
				$base->set('LINK',"https://www.intervision.co/services/3/e-commerce-web-development/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/e-commerce-web-development-share.jpg");





 		}else if($usecase_id==4){
 			// $title = 'POS Sales System Development :: Intervision.co';
 			// $desc = 'The main aim of using a POS solution is to reduce the manual effort it takes to operate a retail store and hence improve the performance and productivity of the entire system.';
 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบขาย POS Sales System Development';
		 			$_desc = 'บริการพัฒนาระบบขาย POS Sales System Development การเปิดบิลขายที่รวดเร็วและแม่นยำ การจัดการสินค้าคงคลัง การจัดการลูกค้าสัมพันธ์ รายงานครบถ้วนสมบูรณ์';
		 			$_keyword = 'บริการพัฒนาระบบขาย pos, sales system development, จัดการสินค้าคงคลัง, ลูกค้าสัมพันธ์, รายงาน';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบขาย POS Sales System Development';
					$_url_title_des = 'บริการพัฒนาระบบขาย POS Sales System Development การเปิดบิลขายที่รวดเร็วและแม่นยำ การจัดการสินค้าคงคลัง การจัดการลูกค้าสัมพันธ์ รายงานครบถ้วนสมบูรณ์';
					$_url = 'https://www.intervision.co/th/services/4/pos-sales-system-development/';	

		 		}else{
		 			$title = 'POS Sales System Development :: Intervision.co';
		 			$_desc = 'The main aim of using a POS solution is to reduce the manual effort it takes to operate a retail store and hence improve the performance and productivity of the entire system.';
					$_keyword = 'pos solution, sales system development, retail store, custom pos';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'POS Sales System Development :: Intervision.co';
					$_url_title_des = 'The main aim of using a POS solution is to reduce the manual effort it takes to operate a retail store and hence improve the performance and productivity of the entire system.';
					$_url = 'https://www.intervision.co/en/services/4/pos-sales-system-development/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/4/pos-sales-system-development/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/4/pos-sales-system-development/");
				$base->set('LINK',"https://www.intervision.co/services/4/pos-sales-system-development/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/pos-sales-system-development-share.jpg");


 		}else if($usecase_id==5){
 			// $title = 'Stock/Warehouse Management System :: Intervision.co';
 			// $desc = 'Warehouse management software offers tools, processes,
				// 	and best practices that allow businesses to get on top
				// 	of administering warehouse operations.';

 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'ระบบบริหารจัดการคลังสินค้า Stock/Warehouse Management System';
		 			$_desc = 'ระบบบริหารจัดการคลังสินค้า Stock/Warehouse Management System การจัดการสินค้าคงคลัง รายการสั่งซื้อ การวิเคราะห์และรายงาน';
		 			$_keyword = 'ระบบบริหารจัดการคลังสินค้า, warehouse management system, สินค้าคงคลัง, รายการสั่งซื้อ';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'ระบบบริหารจัดการคลังสินค้า Stock/Warehouse Management System';
					$_url_title_des = 'ระบบบริหารจัดการคลังสินค้า Stock/Warehouse Management System การจัดการสินค้าคงคลัง รายการสั่งซื้อ การวิเคราะห์และรายงาน';
					$_url = 'https://www.intervision.co/th/services/5/stock-warehouse-management-system/';	

		 		}else{
		 			$title = 'Stock/Warehouse Management System :: Intervision.co';
		 			$_desc = 'Warehouse management software offers tools, processes,and best practices that allow businesses to get on top of administering warehouse operations.';
					$_keyword = 'stock, warehouse management system, software, operation';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Stock/Warehouse Management System :: Intervision.co';
					$_url_title_des = 'Warehouse management software offers tools, processes, and best practices that allow businesses to get on top of administering warehouse operations.';
					$_url = 'https://www.intervision.co/en/services/5/stock-warehouse-management-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/5/stock-warehouse-management-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/5/stock-warehouse-management-system/");
				$base->set('LINK',"https://www.intervision.co/services/5/stock-warehouse-management-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/stock-warehouse-management-system-share.jpg");



 		}else if($usecase_id==6){
 			// $title = 'Customer Loyalty & Rewards System :: Intervision.co';
 			// $desc = 'A Fully Customizable Loyalty Program that is easy to use. We empower you to a customized loyalty program that can make your customers and members feel special.';


 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบ Customer Loyalty & Rewards :: Intervision.co';
		 			$_desc = 'บริการพัฒนาระบบ Customer Loyalty & Rewards สร้างรูปแบบ Loyalty เพื่อตอบแทนลูกค้าและสมาชิกของคุณ แคมเปญการให้รางวัล จัดการรางวัล รหัสโปรโมชั่น และสิทธิประโยชน์';
		 			$_keyword = 'บริการพัฒนาระบบ, Customer Loyalty & Rewards, ลูกค้า, สมาชิก, แคมเปญ, รางวัล, รหัสโปรโมชั่น';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบ Customer Loyalty & Rewards :: Intervision.co';
					$_url_title_des = 'บริการพัฒนาระบบ Customer Loyalty & Rewards สร้างรูปแบบ Loyalty เพื่อตอบแทนลูกค้าและสมาชิกของคุณ แคมเปญการให้รางวัล จัดการรางวัล รหัสโปรโมชั่น และสิทธิประโยชน์';
					$_url = 'https://www.intervision.co/th/services/6/customer-loyalty-rewards-system/';	

		 		}else{
		 			$title = 'Customer Loyalty & Rewards System :: Intervision.co';
		 			$_desc = 'A Fully Customizable Loyalty Program that is easy to use. We empower you to a customized loyalty program that can make your customers and members feel special.';
					$_keyword = 'customer loyalty system, rewards system, customized, customer management';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Customer Loyalty & Rewards System :: Intervision.co';
					$_url_title_des = 'A Fully Customizable Loyalty Program that is easy to use. We empower you to a customized loyalty program that can make your customers and members feel special.';
					$_url = 'https://www.intervision.co/en/services/6/customer-loyalty-rewards-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/6/customer-loyalty-rewards-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/6/customer-loyalty-rewards-system/");
				$base->set('LINK',"https://www.intervision.co/services/6/customer-loyalty-rewards-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/customer-loyalty-rewards-system-share.jpg");



 		}else if($usecase_id==7){
 			// $title = 'Online Booking System :: Intervision.co';
 			// $desc = 'Effortlessly manage service booking reservations from all channels in a single, easy-to-use system.';

 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบจองออนไลน์ Online Booking System :: Intervision.co';
		 			$_desc = 'description" content="บริการพัฒนาระบบจองออนไลน์ Online Booking System จัดการการจองบริการ จองตั๋ว การเช่า ชำระเงินออนไลน์';
		 			$_keyword = 'บริการพัฒนาระบบจองออนไลน์, Online Booking System, จองบริการ, จองตั๋ว, การเช่า, ชำระเงินออนไลน์';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบจองออนไลน์ Online Booking System :: Intervision.co';
					$_url_title_des = 'บริการพัฒนาระบบจองออนไลน์ Online Booking System จัดการการจองบริการ จองตั๋ว การเช่า ชำระเงินออนไลน์';
					$_url = 'https://www.intervision.co/th/services/7/online-booking-system/';	

		 		}else{
		 			$title = 'Online Booking System :: Intervision.co';
		 			$_desc = 'Effortlessly manage service booking reservations from all channels in a single, easy-to-use system.';
					$_keyword = 'online booking system, service reservation, ticketing, appointment booking';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Online Booking System :: Intervision.co';
					$_url_title_des = 'Effortlessly manage service booking reservations from all channels in a single, easy-to-use system.';
					$_url = 'https://www.intervision.co/en/services/7/online-booking-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/7/online-booking-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/7/online-booking-system/");
				$base->set('LINK',"https://www.intervision.co/services/7/online-booking-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/online-booking-system-share.jpg");



 		}else if($usecase_id==8){
 			// $title = 'Online E-Learning/Training System :: Intervision.co';
 			// $desc = 'Your own customized E-Learning platform. Enterprise friendly E-Learning system Train your people. Measure results. Drive growth.';

 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบเรียนอบรมออนไลน์ Online E-Learning/Training System';
		 			$_desc = 'บริการพัฒนาระบบเรียนอบรมออนไลน์ Online E-Learning/Training System ปรับปรุงประสิทธิภาพการเรียนรู้ การทดสอบที่หลากหลาย วัดผล ผลักดันการเติบโต';
		 			$_keyword = 'บริการพัฒนาระบบเรียนอบรมออนไลน์, Online E-Learning/Training System, การเรียนรู้, การทดสอบ, วัดผล';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบเรียนอบรมออนไลน์ Online E-Learning/Training System';
					$_url_title_des = 'บริการพัฒนาระบบเรียนอบรมออนไลน์ Online E-Learning/Training System ปรับปรุงประสิทธิภาพการเรียนรู้ การทดสอบที่หลากหลาย วัดผล ผลักดันการเติบโต';
					$_url = 'https://www.intervision.co/th/services/8/online-e-learning-training-system/';	

		 		}else{
		 			$title = 'Online E-Learning/Training System :: Intervision.co';
		 			$_desc = 'Your own customized E-Learning platform. Enterprise friendly E-Learning system Train your people. Measure results. Drive growth.';
					$_keyword = 'online e-learning system, training, customized platform, enterprise';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'Online E-Learning/Training System :: Intervision.co';
					$_url_title_des = 'Your own customized E-Learning platform. Enterprise friendly E-Learning system Train your people. Measure results. Drive growth.';
					$_url = 'https://www.intervision.co/en/services/8/online-e-learning-training-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/8/online-e-learning-training-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/8/online-e-learning-training-system/");
				$base->set('LINK',"https://www.intervision.co/services/8/online-e-learning-training-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/online-e-learning-training-system-share.jpg");



 		}else if($usecase_id==9){
 			// $title = 'School Management System :: Intervision.co';
 			// $desc = 'School Management System made simple! Easy to maintain and enhance managing process with great software platform.';

 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบบริหารจัดการโรงเรียน School Management System';
		 			$_desc = 'บริการพัฒนาระบบบริหารจัดการโรงเรียน School Management System วิเคราะห์ข้อมูลนักเรียน ช่วยในการจัดการการเข้าเรียน การประเมินผลและให้คะแนน และรายงานเกรด';
		 			$_keyword = 'บริการพัฒนาระบบบริหารจัดการโรงเรียน, School Management System, วิเคราะห์, ข้อมูลนักเรียน, การเข้าเรียน, การประเมินผล, ให้คะแนน, รายงานเกรด';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบบริหารจัดการโรงเรียน School Management System';
					$_url_title_des = 'บริการพัฒนาระบบบริหารจัดการโรงเรียน School Management System วิเคราะห์ข้อมูลนักเรียน ช่วยในการจัดการการเข้าเรียน การประเมินผลและให้คะแนน และรายงานเกรด';
					$_url = 'https://www.intervision.co/th/services/9/school-management-system/';	

		 		}else{
		 			$title = 'School Management System :: Intervision.co';
		 			$_desc = 'School Management System made simple! Easy to maintain and enhance managing process with great software platform.';
					$_keyword = 'school management system, software platform, student, teacher, assignment, calendar, portal';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'School Management System :: Intervision.co';
					$_url_title_des = 'School Management System made simple! Easy to maintain and enhance managing process with great software platform.';
					$_url = 'https://www.intervision.co/en/services/9/school-management-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/9/school-management-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/9/school-management-system/");
				$base->set('LINK',"https://www.intervision.co/services/9/school-management-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/school-management-system-share.jpg");

				

 		}else if($usecase_id==10){
 			// $title = 'E-mail Marketing System :: Intervision.co';
 			// $desc = 'Better email marketing. Better results. Put the right emails in front of the right people.';

 			$lang = $_SESSION['language'];
		 		if($lang == 'th'){
		 			$title = 'บริการพัฒนาระบบการตลาดผ่านอีเมล E-mail Marketing System';
		 			$_desc = 'บริการพัฒนาระบบการตลาดผ่านอีเมล E-mail Marketing System ส่งอีเมลที่ใช่ไปที่กลุ่มคนเป้าหมายที่ใช่ ระบบทำการตลาดอัตโนมัติด้วยเทมเพลตอีเมลระดับมืออาชีพ';
		 			$_keyword = 'บริการพัฒนาระบบการตลาดผ่านอีเมล, E-mail Marketing System, กลุ่มคนเป้าหมาย, ระบบทำการตลาดอัตโนมัติ, เทมเพลตอีเมล, มืออาชีพ';
		 			$_lang = 'th';
		 			$_url_lang = 'th_TH';
					$_url_title = 'บริการพัฒนาระบบการตลาดผ่านอีเมล E-mail Marketing System';
					$_url_title_des = 'บริการพัฒนาระบบการตลาดผ่านอีเมล E-mail Marketing System ส่งอีเมลที่ใช่ไปที่กลุ่มคนเป้าหมายที่ใช่ ระบบทำการตลาดอัตโนมัติด้วยเทมเพลตอีเมลระดับมืออาชีพ';
					$_url = 'https://www.intervision.co/th/services/10/email-marketing-system/';	

		 		}else{
		 			$title = 'E-mail Marketing System :: Intervision.co';
		 			$_desc = 'Better email marketing. Better results. Put the right emails in front of the right people.';
					$_keyword = 'e-mail marketing system, e-mail, pre-designed templates, automation, broadcast email';
					$_lang = 'en';
					$_url_lang = 'en_US';
					$_url_title = 'E-mail Marketing System :: Intervision.co';
					$_url_title_des = 'Better email marketing. Better results. Put the right emails in front of the right people.';
					$_url = 'https://www.intervision.co/en/services/10/email-marketing-system/';
		 		}

		 		$base->set('LINK_EN',"https://www.intervision.co/en/services/10/email-marketing-system/");
				$base->set('LINK_TH',"https://www.intervision.co/th/services/10/email-marketing-system/");
				$base->set('LINK',"https://www.intervision.co/services/10/email-marketing-system/");
				$base->set('IMG_SHARE',"https://intervision.co/assets/images/email-marketing-system-share.jpg");

 		}
 		
 		$base->set('TITLE',$title);
		$base->set('DESC',$_desc);
		$base->set('KEY',$_keyword);
		$base->set('LANG',$_lang);
		
		$base->set('url_lang',$_url_lang);
		$base->set('url_title',$_url_title);
		$base->set('url_title_des',$_url_title_des);
		$base->set('url',$_url);


 		$base->set('active_usecases','current-menu-item');
 		Template::getInstance()->pagecontent = 'services/usecase_'.$usecase_id.'.htm';
		Template::getInstance()->render('layout.htm');

	} 

	
 }
?>
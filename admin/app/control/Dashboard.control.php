<?php
 class Dashboard {
 	
 	
 	
 	public function home($base){


 		Template::getInstance()->render('dashboard/home.htm');
	}
	public function profile($base){
		$member = new Member();
		$memberonfomation = $member->memberInfomation();
		$base->set('user_id',$base->get('_userid'));
		$positionList = $member->positionList();
		$memberInfomation = $member->memberInfomationByID();
		
		$base->set('memberinfomation',$memberInfomation);
		$base->set('positionList',$positionList);
		$base->set('tab','profile');
		
		Template::getInstance()->render('dashboard/viewprofile.htm');
	}
	
 }
?>
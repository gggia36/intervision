<?php
 class User extends Permission{
 	
 	public function beforeroute($base){
 		$this->module_ids = '5';
		$this->set_permission('userlist','2');
		$this->set_view('view','2');
		$this->set_edit('create','2');
		$this->set_edit('edit','2');
		$this->set_delete('delete','2');
		
		$this->PermissionAuth();
		
	}
 	
 	public function userlist($base){
 		
		$member = new Member();
		
		$memberList = $member->memberList();
		
		$base->set('memberList',$memberList);
		
		Template::getInstance()->render('user/userlist.htm');
	}
	public function create($base){
 		$member = new Member();
		
		
		
		
		
		Template::getInstance()->render('user/create.htm');
	}
	public function edit($base){
		$member = new Member();
		
		
		
		$base->set('user_id',$base->get('_userid'));
		
		
		
		$memberInfomation = $member->memberInfomationByID();
		
		$base->set('memberinfomation',$memberInfomation);
		
		
		Template::getInstance()->render('user/create.htm');
	}
	public function profile($base){
		$member = new Member();
		$memberonfomation = $member->memberInfomation();
		$base->set('user_id',$memberonfomation['id']);
		
		
		
		$memberInfomation = $member->memberInfomationByID();
		
		$base->set('memberinfomation',$memberInfomation);
		
		$base->set('tab','profile');
		
		Template::getInstance()->render('user/viewprofile.htm');
	}
	public function editprofile($base){
		$member = new Member();
		$memberonfomation = $member->memberInfomation();
		$base->set('user_id',$memberonfomation['id']);
		
		
		
		$memberInfomation = $member->memberInfomationByID();
		
		$base->set('memberinfomation',$memberInfomation);
		
		
		Template::getInstance()->render('user/profile.htm');
	}
	public function view($base){
		$member = new Member();
		
		$base->set('user_id',$base->get('_userid'));
		
		
		
		$memberInfomation = $member->memberInfomationByID();
		
		$base->set('memberinfomation',$memberInfomation);
		
		
		$base->set('tab','view');
		
		Template::getInstance()->render('user/viewprofile.htm');
	}
	public function delete($base){
		$member = new Member();
		$member->updateUserActiveStatus();
	}
	public function checkusername($base){
		$member = new Member();
		echo $member->checkUsername();
		//echo $base->get('GET.name');
	}
	 
	public function updateuserstatus($base){
		$member = new Member();
		$member->updateStatusMember();
	}
	
	public function processFrm($base){
		$member = new Member();
		$mode = $base->get('POST.mode');
		if($mode=='create'){
			$result = $member->createMember();
			if($result){
				echo '<script>window.top.successCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='edit'){
			$result = $member->updateMember();
			if($result){
				echo '<script>window.top.successCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='profile'){
			$result = $member->updateMember();
			if($result){
				// echo '<script>window.top.location.reload();</script>';
				echo '<script>window.top.location.hash="/user/profile/";</script>';
			}else{
				echo "F";
			}
		}
	}
	
 }
?>
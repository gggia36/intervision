<?php
 class Member {





 	public function memberInfomation(){
		$resultreturn = $this->_memberIfomation();
		return $resultreturn;
	}
	public function memberInfomationByID(){
		$resultreturn = $this->_memberIfomationByID();
		return $resultreturn;
	}
	public function createMember(){
		$resultreturn = $this->_createMember();
		return $resultreturn;
	}
	public function updateMember(){
		$resultreturn = $this->_updateMember();
		return $resultreturn;
	}
	public function updateUserActiveStatus(){
		$resultreturn = $this->_updateUserActiveStatus();
		return $resultreturn;
	}
	public function checkUsername(){
		$resultreturn = $this->_checkUsername();
		return $resultreturn;
	}
	public function updateStatusMember(){
		$resultreturn = $this->_updateStatusMember();
		return $resultreturn;
	}
	public function checkEmail(){
		$resultreturn = $this->_checkEmail();
		return $resultreturn;
	}





 	private function _memberIfomation(){
 		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		$cookie = $base->get('COOKIE');
 		$token = $cookie['token'];

 		$setting = new SSetting();
 		//echo $token;
 		if($token!=''){
			$sql = "SELECT * FROM project_user  WHERE user_token=".GF::quote($token);

			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['id'] = $res->fields['id'];
			$arrReturn['user_username'] = $res->fields['user_username'];
			$arrReturn['user_name'] = $res->fields['user_name'];
			$arrReturn['user_nickname'] = $res->fields['user_nickname'];
			$arrReturn['user_email'] = $res->fields['user_email'];
			$arrReturn['user_thumb'] = $res->fields['user_thumb'];
			$arrReturn['user_role_id'] = $res->fields['user_role_id'];

			$base->set('_ids_',$res->fields['user_role_id']);
			$group_info = $setting->groupInfomation();

			$arrReturn['role_name'] = $group_info['role_name'];
			$materdata = GF::masterdata($res->fields['position_id']);
			$arrReturn['position_name'] = $materdata['master_name'];
			$arrReturn['user_start_date'] = $res->fields['user_start_date'];
			$arrReturn['sick_leave'] = $res->fields['sick_leave'];
			$arrReturn['personal_leave'] = $res->fields['personal_leave'];
			$arrReturn['vacation_leave'] = $res->fields['vacation_leave'];
			$arrReturn['position_id'] = $res->fields['position_id'];
			$arrReturn['user_birthdate'] = $res->fields['user_birthdate'];
			$arrReturn['user_theme'] = $res->fields['user_theme'];
			$arrReturn['user_phone_number'] = $res->fields['user_phone_number'];
			$arrReturn['status'] = $res->fields['status'];
			$arrReturn['other_status'] = $res->fields['other_status'];
			//GF::print_r($arrReturn);
			return $arrReturn;
		}else{
			return NULL;
		}

	}
	private function _memberIfomationByID(){
 		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		$user_id = $base->get('user_id');
      if($base->get('bind_id')!=''){
         $user_id = $base->get('bind_id');
      }
 		//echo $token;
 		if($user_id!=''){
			$sql = "SELECT * FROM project_user  WHERE id=".GF::quote($user_id);

			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['id'] = $res->fields['id'];
			$arrReturn['user_username'] = $res->fields['user_username'];
			$arrReturn['user_password'] = $res->fields['user_password'];
			$arrReturn['user_name'] = $res->fields['user_name'];
			$arrReturn['user_nickname'] = $res->fields['user_nickname'];
			$arrReturn['user_email'] = $res->fields['user_email'];
			$arrReturn['user_thumb'] = $res->fields['user_thumb'];
			$arrReturn['user_role_id'] = $res->fields['user_role_id'];
			$materdata = GF::masterdata($res->fields['position_id']);
			$arrReturn['position_name'] = $materdata['master_name'];
			$arrReturn['user_start_date'] = $res->fields['user_start_date'];
			$arrReturn['sick_leave'] = $res->fields['sick_leave'];
			$arrReturn['personal_leave'] = $res->fields['personal_leave'];
			$arrReturn['vacation_leave'] = $res->fields['vacation_leave'];
			$arrReturn['position_id'] = $res->fields['position_id'];
			$arrReturn['user_theme'] = $res->fields['user_theme'];
			$arrReturn['user_birthdate'] = $res->fields['user_birthdate'];
			$arrReturn['user_phone_number'] = $res->fields['user_phone_number'];
			$arrReturn['status'] = $res->fields['status'];
			$arrReturn['other_status'] = $res->fields['other_status'];
			//GF::print_r($arrReturn);
			return $arrReturn;
		}else{
			return NULL;
		}

	}
	private function _checkUsername(){
 		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		$user_name = $base->get('GET.name');
 		//echo $token;
 		if($user_name!=''){
			$sql = "SELECT * FROM project_user WHERE user_username=".GF::quote($user_name)." AND status='O'";

			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);


			$arr =  $res->fields['id'];
			if($arr==''){
				return 'A';
			}else{
				return 'F';
			}


		}else{
			return 'F';
		}

	}
	public function memberList(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		//$working = new Working();

		$sql = "SELECT * FROM project_user  WHERE status='O' ORDER BY id ASC";
		$res = $db->Execute($sql);

		$arrReturn = array();
		$i = 0;
		while(!$res->EOF){
			$arrReturn[$i]['id'] = $res->fields['id'];
			$arrReturn[$i]['user_name'] = $res->fields['user_name'];
			$arrReturn[$i]['user_nickname'] = $res->fields['user_nickname'];
			$arrReturn[$i]['user_thumb'] = $res->fields['user_thumb'];
			$arrReturn[$i]['user_email'] = $res->fields['user_email'];
			$arrReturn[$i]['user_start_date'] = $res->fields['user_start_date'];
			$arrReturn[$i]['user_birthdate'] = date('d F Y',strtotime($res->fields['user_birthdate']));
			$arrReturn[$i]['sick_leave'] = $res->fields['sick_leave'];
			$arrReturn[$i]['personal_leave'] = $res->fields['personal_leave'];
			$arrReturn[$i]['vacation_leave'] = $res->fields['vacation_leave'];
			$materdata = GF::masterdata($res->fields['position_id']);
			$arrReturn[$i]['position_name'] = $materdata['master_name'];
			$arrReturn[$i]['user_theme'] = $res->fields['user_theme'];
			$arrReturn[$i]['status'] = $res->fields['status'];
			$arrReturn[$i]['active_status'] = $res->fields['active_status'];
			$arrReturn[$i]['other_status'] = $res->fields['other_status'];
			$arrReturn[$i]['user_phone_number'] = $res->fields['user_phone_number'];
			$arrReturn[$i]['user_role_id'] = $res->fields['user_role_id'];
			$base->set('_user_id',$res->fields['id']);
			$arrReturn[$i]['online'] = '';//$working->checkWokingByID();
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;
	}
	
	
	public function memberOnlineDashboard(){
		$alllist = $this->memberList();

		$i=0;
		$j=0;
		$arr_a = array();
		$arr_b = array();
		foreach($alllist as $vals){
			if($vals['online']>0){
				$arr_a[$i] = $vals;
				$i++;
			}else{
				$arr_b[$j] = $vals;
				$j++;
			}
		}
		$arrReturn = array();
		$num = 0;
		if(count($arr_a)>0){
			foreach($arr_a as $value_a){
				$arrReturn[$num] = $value_a;
				$num++;
			}
		}
		if(count($arr_b)>0){
			foreach($arr_b as $value_b){
				$arrReturn[$num] = $value_b;
				$num++;
			}
		}
		return 	$arrReturn;
	}
	public function memberListByGroup(){

		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		//$working = new Working();
 		$group_id = $base->get('_role_id');

		$sql = "SELECT * FROM project_user WHERE user_role_id=".GF::quote($group_id)." AND active_status='O' ORDER BY id ASC";
		//echo $sql;
		$res = $db->Execute($sql);

		$arrReturn = array();
		$i = 0;
		while(!$res->EOF){
			$arrReturn[$i]['id'] = $res->fields['id'];
			$arrReturn[$i]['user_name'] = $res->fields['user_name'];
			$arrReturn[$i]['user_nickname'] = $res->fields['user_nickname'];
			$arrReturn[$i]['user_thumb'] = $res->fields['user_thumb'];
			$arrReturn[$i]['user_email'] = $res->fields['user_email'];
			$arrReturn[$i]['user_start_date'] = $res->fields['user_start_date'];
			$arrReturn[$i]['sick_leave'] = $res->fields['sick_leave'];
			$arrReturn[$i]['personal_leave'] = $res->fields['personal_leave'];
			$arrReturn[$i]['vacation_leave'] = $res->fields['vacation_leave'];
			$materdata = GF::masterdata($res->fields['position_id']);
			$arrReturn[$i]['position_name'] = $materdata['master_name'];
			$arrReturn[$i]['user_theme'] = $res->fields['user_theme'];
			$arrReturn[$i]['status'] = $res->fields['status'];
			$arrReturn[$i]['active_status'] = $res->fields['active_status'];
			$arrReturn[$i]['other_status'] = $res->fields['other_status'];
			$base->set('_user_id',$res->fields['id']);
			//$arrReturn[$i]['online'] = $working->checkWokingByID();
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;
	}
	public function positionList(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

		$sql = "SELECT * FROM project_position WHERE status='O' AND active_status='O' ORDER BY id ASC";
		$res = $db->Execute($sql);

		$res = $db->Execute($sql);
		$arrReturn = array();
		$i = 0;
		while(!$res->EOF){
			$arrReturn[$i]['id'] = $res->fields['id'];
			$arrReturn[$i]['position_name'] = $res->fields['position_name'];
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;
	}

 	private function _createMember(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		$picsave = '';
		$sql = "INSERT INTO project_user (
											  user_username,
											  user_email,
											  user_password,
											  user_name,
											  user_birthdate,
											  user_phone_number,
											 user_role_id,
											 status,
											   active_status,
											  create_dtm
											)VALUES(
												".GF::quote($base->get('POST.user_email')).",
												".GF::quote($base->get('POST.user_email')).",
												".GF::quote(md5($base->get('POST.user_password'))).",
												".GF::quote($base->get('POST.user_name')).",
												".GF::quote(date("Y-m-d", strtotime($base->get('POST.birthdate')))).",
												".GF::quote($base->get('POST.user_phone_number')).",
												'13',
												'O',
												'O',
												NOW()
											)";

		$res = $db->Execute($sql);

		if($res){
			return true;
		}else{
			return false;
		}

	}

	private function _updateMember(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

 		$password = $base->get('POST.user_password');

 		
		if(!empty($password)){
			$sql = "UPDATE project_user SET user_password=".GF::quote(md5($base->get('POST.user_password')))." WHERE id=".GF::quote($base->get('POST.user_id'));
			$res = $db->Execute($sql);
		}

		$sql = "UPDATE project_user SET
									 user_name=".GF::quote($base->get('POST.user_name')).",
									  user_birthdate=".GF::quote(date("Y-m-d", strtotime($base->get('POST.birthdate')))).",
									  user_phone_number=".GF::quote($base->get('POST.user_phone_number')).",
									  update_dtm=NOW()
										WHERE id=".GF::quote($base->get('POST.user_id'));
		$res = $db->Execute($sql);
 		if($res){
			return true;
		}else{
			return false;
		}
	}

	private function _updateUserActiveStatus(){

		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

		$sql = "UPDATE project_user SET
									  status='C',
									  update_dtm=NOW()
										WHERE id=".GF::quote($base->get('_userid'));
		$res = $db->Execute($sql);
 		if($res){
			return true;
		}else{
			return false;
		}
	}


	public function  getProjectTeambyLeader($owner_id = NULL)
	{
		$base 	= Base::getInstance();
 		$db 	= DB::getInstance()->condb();

 		$working = new Working();

 		if(isset($owner_id)){
 			$owner_id_arr = explode(',', $owner_id);
 		}else{
 			$owner_id_arr = array();
 		}

 		$ownerID = "";
 		foreach ($owner_id_arr as $id) {
 			$ownerID .= " AND id!=".$id;
 		}

		$sql = "SELECT  id,user_name,user_nickname
				FROM project_user
				WHERE active_status='O'  ".$ownerID."  ORDER BY id ASC";
		$res = $db->Execute($sql);

		$arrReturn = array();
		$i = 0;
		while(!$res->EOF){
			$arrReturn[$i]['id'] 			= $res->fields['id'];
			$arrReturn[$i]['user_name'] 	= $res->fields['user_name'];
			$arrReturn[$i]['user_nickname'] = $res->fields['user_nickname'];
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;
	}
	private function _updateStatusMember(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_user SET
										active_status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
	private function _checkEmail(){
		$base = Base::getInstance();
	 	$db = DB::getInstance()->condb();
		$email = $base->get('GET.email');
		$sql = "SELECT COUNT(*) AS total FROM project_user WHERE user_email=".GF::quote($email)." AND status='O'";
		$res = $db->Execute($sql);
		//GF::print_r($datas);
		if($res->fields['total']>0){
			return FALSE;
		}else{
			return TRUE;
		}
		
	}
 }
?>

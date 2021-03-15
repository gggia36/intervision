<?php
 class Authen {
 	
 	
 	
 	public function validateLogin(){
		$resultreturn = $this->_validateLogin();
		return $resultreturn;
	}
	public function accessLogin(){
		$resultreturn = $this->_accessLogin();
		return $resultreturn;
	}
	public function accessLogout(){
		$resultreturn = $this->_accessLogout();
		return $resultreturn;
	}
	
 	
 	private function _validateLogin(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		$cookie = $base->get('COOKIE');
		$token = $cookie['token'];
 		
		$sql = "SELECT * FROM project_user WHERE user_token=".GF::quote($token); 

		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		
		if($res->fields['id']==''){
			unset($_COOKIE['token']);
    		setcookie('token', '', time() - 3600, '/');
			return false;
			exit();
		}
			
			
		if(empty($cookie['token'])){
			return false;
		}else{
			$base->set('token',$token);
			$base->set('log_user_id',$res->fields['id']);
			$this->_validateAccessWorking();
			return true;
		}
	}
	private function _accessLogin(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		
		$username = $base->get('POST.vc_username');
		$password = $base->get('POST.vc_password');
		
		if(!empty($username) && !empty($password)){
			$sql = "SELECT * FROM project_user WHERE user_username=".GF::quote($username); 

			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['user_username'] = $res->fields['user_username'];
			$arrReturn['id'] = $res->fields['id'];
			
			
			/*------ ACCESS LOG----------*/
			$base->set('log_user_id',$arrReturn['id']);
			$base->set('log_event_type','1'); //1=login,2=logout,3=module
			$base->set('log_module_id','0');
			
			
			if($res->fields['user_username']!=''){
				if($res->fields['user_password']==md5($password)){
					
					$token = $this->_updateLoginLog();
					setcookie('token', $token, time() + (86400 * 2), "/"); 
					$base->set('log_extra','Success');
					$base->set('token',$token);
					$this->_logAccess();
					$this->_validateAccessWorking();
					return 'A';
					
				}else{
					$base->set('log_extra','Wrong Password');
					$this->_logAccess();
					return 'P';
				}
				
			}else{
				return 'U';
			}
			
		}
		
	}
	private function _updateLoginLog(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		
		$token = GF::randomStr(25);
		
		$sql = "UPDATE project_user SET user_token=".GF::quote($token)." WHERE user_username=".GF::quote($base->get('POST.vc_username'));
		$res = $db->Execute($sql);
		
		if($res){
			return $token;
		}else{
			return 0;
		}
		 
	}
	private function _accessLogout(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		$cookie = $base->get('COOKIE');
		if(!empty($cookie['token'])){

			/*------ ACCESS LOG----------*/
			
			$member = new Member();
			$userinfo = $member->memberInfomation();
			$base->set('log_user_id',$userinfo['id']);
			$base->set('log_event_type','2'); //1=login,2=logout,3=module
			$base->set('log_module_id','0');
			
			$base->set('log_extra','Success');
			$this->_logAccess();
			
			$sql = "UPDATE project_user SET user_token='' WHERE user_token=".GF::quote($cookie['token']);
			$res = $db->Execute($sql);
			
		}
		unset($_COOKIE['token']);
    	setcookie('token', '', time() - 3600, '/');
		
	}
	private function _logAccess(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		
		$user_id = $base->get('log_user_id');
		$event_type = $base->get('log_event_type'); //1=login,2=logout,3=module
		$module_id = $base->get('log_module_id');
		$extra = $base->get('log_extra');
		$token = '0';
		$cookie = $base->get('token');
		if(!empty($cookie)){
			$token = $cookie;
		}
		
		
		$ipaddress = GF::viewipaddress();
		
		$sql = "INSERT INTO project_user_log (
											  user_id,
											  token,
											  event_type,
											  module_id,
											  ipaddress,
											  extra,
											  create_dtm
											)VALUES(
												".GF::quote($user_id).",
												".GF::quote($token).",
												".GF::quote($event_type).",
												".GF::quote($module_id).",
												".GF::quote($ipaddress).",
												".GF::quote($extra).",
												NOW()
											)";

		$res = $db->Execute($sql);
	}
	private function _validateAccessWorking(){
		$base = Base::getInstance();
		$db  = DB::getInstance()->condb();
		$user_id = $base->get('log_user_id');
		
		$sql = "SELECT * FROM project_user_working WHERE user_id=".GF::quote($user_id)." AND status='W' ORDER BY id DESC LIMIT 1"; 

		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$arrReturn = array();
		
		$cf_start = strtotime('09:00:00');
		$curr_start = strtotime($res->fields['working_time']);
		
		if($res->fields['id']!=''){
			$currentDate = date('d-m-Y');
			$workingDate = date("d-m-Y", strtotime($res->fields['working_date']));
			if($currentDate!=$workingDate){
				
				$late_time = 0;
				$ipaddress = GF::viewipaddress();
				if($curr_start>$cf_start){
					$late_time += round(abs($curr_start - $cf_start) / 60,2);
				}
				
				$sql = "UPDATE project_user_working SET end_date=NOW(), end_time=NOW() ,late_time='".$late_time."', status='L',end_ip='".$ipaddress."' WHERE id=".GF::quote($res->fields['id']);
				//echo $sql;
				$res = $db->Execute($sql);
				
			}else{
				$token = $base->get('token');
				$sql = "UPDATE project_user_working SET token='".$token."' WHERE id=".GF::quote($res->fields['id']);
				$res = $db->Execute($sql);
			}
		}
	}
 	
 }
?>
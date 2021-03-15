<?php
	class Setting extends Permission{

		public function beforeroute($base){
	 		$this->module_ids = '9';
			$this->set_permission('permission','6');
	
			//$this->set_view('view','2');
			$this->set_edit('creategroup','6');
			$this->set_edit('editgroup','6');
			$this->set_edit('edituser','6');
			$this->set_delete('deletegroup','6');


			$this->PermissionAuth();

		}
		
		/////////////// Permission Controller //////////////////
		public function permission($base){
			$setting = new SSetting();
			$groupList = $setting->groupList();

			$base->set('groupList',$groupList);
			Template::getInstance()->render('setting/permissionlist.htm');
		}

		public function creategroup($base){
			$setting = new SSetting();
			$moduleList = $setting->moduleList();
			//GF::print_r($moduleList);

			$base->set('moduleList',$moduleList);

			Template::getInstance()->render('setting/creategroup.htm');
		}
		public function editgroup($base){
			$setting = new SSetting();
			$moduleList = $setting->moduleList();
			
			$base->set('_ids_','');

			$groupInfomation = $setting->groupInfomation();
			//GF::print_r($groupInfomation);

			$base->set('moduleList',$moduleList);
			$base->set('groupInfo',$groupInfomation);

			Template::getInstance()->render('setting/creategroup.htm');
		}
		public function deletegroup($base){
			
			$setting = new SSetting();
			$setting->deleteGroup();
		}
		public function edituser($base){
			$setting = new SSetting();
			$member = new Member();
			$base->set('_ids_','');
			$groupInfomation = $setting->groupInfomation();

			$base->set('groupInfo',$groupInfomation);
			//GF::print_r($groupInfomation);

			$base->set('_role_id',$base->get('_ids'));

			$memberListGroup = $member->memberListByGroup();
			$memberList = $member->memberList();

			$base->set('memberList',$memberList);
			$base->set('memberListGroup',$memberListGroup);

			Template::getInstance()->render('setting/groupuserlist.htm');
		}
		

		


		/////////////// Process Form Controller //////////////////
		public function processFrm($base){
			$setting = new SSetting();

			
			$mode = $base->get('POST.mode');
		
			if($mode=='creategroup'){
				$result = $setting->createGroup();
				if($result){
					echo '<script>window.top.successCallBack();</script>';
				}else{
					echo "F";
				}
			}
			else if($mode=='editgroup'){
			
				$result = $setting->updateGroup(); 
				if($result){
					echo '<script>window.top.successCallBack();</script>';
				}else{
					echo "F";
				}
			}
			else if($mode=='edituser'){
				$result = $setting->updateUserPermission();
				if($result){
					echo '<script>window.top.successCallBack();</script>';
				}else{
					echo "F";
				}
			}
	
		}

	}
?>
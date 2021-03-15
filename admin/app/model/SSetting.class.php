<?php
	class SSetting {

		public function moduleList(){
			$resultreturn =  $this->_modlueList();
			return $resultreturn;
		}
		public function createGroup(){
			$resultreturn =  $this->_createGroup();
			return $resultreturn;
		}
		public function updateGroup(){
			$resultreturn =  $this->_updateGroup();
			return $resultreturn;
		}
		public function groupInfomation(){
			$resultreturn =  $this->_groupInfomation();
			return $resultreturn;
		}
		public function groupList(){
			$resultreturn =  $this->_groupList();
			return $resultreturn;
		}
		public function deleteGroup(){
			$resultreturn =  $this->_deleteGroup();
			return $resultreturn;
		}
		public function updateUserPermission(){
			$resultreturn =  $this->_updateUserPermission();
			return $resultreturn;
		}
		
		public function getLanguage(){
			$resultreturn =  $this->_getLanguage();
			return $resultreturn;
		}
		public function createLanguage(){
			$resultreturn =  $this->_createLanguage();
			return $resultreturn;
		}
		public function getLangByID(){
			$resultreturn =  $this->_getLangByID();
			return $resultreturn;
		}
		public function editLanguage(){
			$resultreturn =  $this->_editLanguage();
			return $resultreturn;
		}
		public function delLang(){
			$resultreturn =  $this->_delLang();
			return $resultreturn;
		}
		public function statusLanguage(){
			$resultreturn =  $this->_statusLanguage();
			return $resultreturn;
		}
		public function getLanguageList(){
			$resultreturn =  $this->_getLanguageList();
			return $resultreturn;
		}
		public function createLanguageList(){
			$resultreturn =  $this->_createLanguageList();
			return $resultreturn;
		}
		public function getLangByIDList(){
			$resultreturn =  $this->_getLangByIDList();
			return $resultreturn;
		}
		public function editLanguageList(){
			$resultreturn =  $this->_editLanguageList();
			return $resultreturn;
		}
		public function delLangList(){
			$resultreturn =  $this->_delLangList();
			return $resultreturn;
		}
		public function statusLanguageList(){
			$resultreturn =  $this->_statusLanguageList();
			return $resultreturn;
		}
		



		private function _modlueList(){
			$base = Base::getInstance();
 			//$db = DB::getInstance()->condb();
 			//$member = new Member();
 			$module = new Module();

 			$moduleList = $module->moduleList();

 			return $moduleList;
		}
		private function _createGroup(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$moduleList = $this->_modlueList();


 			$user_id = $memberInfomation['id'];

 			$noti = $base->get('POST.email_notification');
 			$noti_acc = $base->get('POST.email_account');
 			if($noti==''){
				$noti = 'D';
			}
			if($noti_acc==''){
				$noti_acc = 'D';
			}

 			$sql = "INSERT INTO project_role (
												  role_name,
												  email_notification,
												  email_account,
												  status,
												  create_dtm,
												  create_by
												)VALUES(
													".GF::quote($base->get('POST.role_name')).",
													".GF::quote($noti).",
													".GF::quote($noti_acc).",
													'O',
													NOW(),
													".GF::quote($user_id)."
												)";
			//echo $sql;
			$res = $db->Execute($sql);
			if($res){
				$role_id = $db->Insert_ID();
				/*$allow_module = $base->get('POST.allow_module');
				$denied_module = $base->get('POST.denied_module');

				$view_module = $base->get('POST.view_module');
				$edit_module = $base->get('POST.edit_module');
				$delete_module = $base->get('POST.delete_module');

				$allow_item = $base->get('POST.allow_item');
				$denied_item = $base->get('POST.denied_item');

				$view_item = $base->get('POST.view_item');
				$edit_item = $base->get('POST.edit_item');
				$delete_item = $base->get('POST.delete_item');*/

				$allow_module = (is_array($base->get('POST.allow_module'))) ? $base->get('POST.allow_module') : array() ;
				$denied_module = (is_array($base->get('POST.denied_module'))) ? $base->get('POST.denied_module') : array() ;

				$view_module = (is_array($base->get('POST.view_module'))) ? $base->get('POST.view_module') : array() ;
				$edit_module = (is_array($base->get('POST.edit_module'))) ? $base->get('POST.edit_module') : array() ;
				$delete_module = (is_array($base->get('POST.delete_module'))) ? $base->get('POST.delete_module') : array() ;

				$allow_item = (is_array($base->get('POST.allow_item'))) ? $base->get('POST.allow_item') : array() ;
				$denied_item = (is_array($base->get('POST.denied_item'))) ? $base->get('POST.denied_item') : array() ;

				$view_item = (is_array($base->get('POST.view_item'))) ? $base->get('POST.view_item') : array() ;
				$edit_item = (is_array($base->get('POST.edit_item'))) ? $base->get('POST.edit_item') : array() ;
				$delete_item = (is_array($base->get('POST.delete_item'))) ? $base->get('POST.delete_item') : array() ;



				foreach($moduleList as $key=>$list){

						$permission = 'D';
						$per_view = 'D';
						$per_edit = 'D';
						$per_delete = 'D';


						$key_permission = array_search($list['id'],$allow_module);
						$key_view = array_search($list['id'],$view_module);
						$key_edit = array_search($list['id'],$edit_module);
						$key_delete = array_search($list['id'],$delete_module);

						if($key_permission !== false){
							$permission = 'A';
						}
						if($key_view !== false){
							$per_view = 'A';
						}
						if($key_edit !== false){
							$per_edit = 'A';
						}
						if($key_delete !== false){
							$per_delete = 'A';
						}

						$sql = "INSERT INTO project_role_module (
															  role_id,
															  module_id,
															  permission,
															  per_view,
															  per_edit,
															  per_delete
															)VALUES(
																".GF::quote($role_id).",
																".GF::quote($list['id']).",
																".GF::quote($permission).",
																".GF::quote($per_view).",
																".GF::quote($per_edit).",
																".GF::quote($per_delete)."
															)";

						$res = $db->Execute($sql);
						if($list['module_type']=='M'){
							foreach($list['item'] as $items){
								$permission = 'D';
								$per_view = 'D';
								$per_edit = 'D';
								$per_delete = 'D';

								$key_permission = array_search($items['id'],$allow_item);
								$key_view = array_search($items['id'],$view_item);
								$key_edit = array_search($items['id'],$edit_item);
								$key_delete = array_search($items['id'],$delete_item);

								if($key_permission !== false){
									$permission = 'A';
								}
								if($key_view !== false){
									$per_view = 'A';
								}
								if($key_edit !== false){
									$per_edit = 'A';
								}
								if($key_delete !== false){
									$per_delete = 'A';
								}
								$sql = "INSERT INTO project_role_item (
																	  role_id,
																	  item_id,
																	  permission,
																	  per_view,
																	  per_edit,
																	  per_delete
																	)VALUES(
																		".GF::quote($role_id).",
																		".GF::quote($items['id']).",
																		".GF::quote($permission).",
																		".GF::quote($per_view).",
																		".GF::quote($per_edit).",
																		".GF::quote($per_delete)."
																	)";

								$res = $db->Execute($sql);
							}
						}
				}
				return true;
			}else{
				return false;
			}
		}
		private function _updateGroup(){

			$base 	= Base::getInstance();
 			$db 	= DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$moduleList = $this->_modlueList();


 			$user_id = $memberInfomation['id'];

 			$noti = $base->get('POST.email_notification');
 			$noti_acc = $base->get('POST.email_account');
 			if($noti==''){
				$noti = 'D';
			}
			if($noti_acc==''){
				$noti_acc = 'D';
			}

 			echo $sql = "UPDATE project_role SET
											role_name=".GF::quote($base->get('POST.role_name')).",
											email_notification=".GF::quote($noti).",
											email_account=".GF::quote($noti_acc).",
											update_dtm=NOW(),
											update_by=".GF::quote($user_id)."
										    WHERE id=".GF::quote($base->get('POST.role_id'));
			//echo $sql;
			$res = $db->Execute($sql);

			if($res){
				$role_id = $base->get('POST.role_id');

				$sql = "DELETE FROM project_role_module WHERE role_id=".GF::quote($role_id);
				$res = $db->Execute($sql);

				$sql = "DELETE FROM project_role_item WHERE role_id=".GF::quote($role_id);
				$res = $db->Execute($sql);

				$allow_module = $base->get('POST.allow_module');
				$denied_module = $base->get('POST.denied_module');

				$allow_module = (is_array($base->get('POST.allow_module'))) ? $base->get('POST.allow_module') : array() ;
				$denied_module = (is_array($base->get('POST.denied_module'))) ? $base->get('POST.denied_module') : array() ;

				$view_module = (is_array($base->get('POST.view_module'))) ? $base->get('POST.view_module') : array() ;
				$edit_module = (is_array($base->get('POST.edit_module'))) ? $base->get('POST.edit_module') : array() ;
				$delete_module = (is_array($base->get('POST.delete_module'))) ? $base->get('POST.delete_module') : array() ;

				$allow_item = (is_array($base->get('POST.allow_item'))) ? $base->get('POST.allow_item') : array() ;
				$denied_item = (is_array($base->get('POST.denied_item'))) ? $base->get('POST.denied_item') : array() ;

				$view_item = (is_array($base->get('POST.view_item'))) ? $base->get('POST.view_item') : array() ;
				$edit_item = (is_array($base->get('POST.edit_item'))) ? $base->get('POST.edit_item') : array() ;
				$delete_item = (is_array($base->get('POST.delete_item'))) ? $base->get('POST.delete_item') : array() ;

				//GF::print_r($base->get('POST'));

				foreach($moduleList as $key=>$list){

						$permission = 'D';
						$per_view = 'D';
						$per_edit = 'D';
						$per_delete = 'D';


						$key_permission = array_search($list['id'],$allow_module);
						$key_view = array_search($list['id'],$view_module);
						$key_edit = array_search($list['id'],$edit_module);
						$key_delete = array_search($list['id'],$delete_module);

						if($key_permission !== false){
							$permission = 'A';
						}
						if($key_view !== false){
							$per_view = 'A';
						}
						if($key_edit !== false){
							$per_edit = 'A';
						}
						if($key_delete !== false){
							$per_delete = 'A';
						}

						$sql = "INSERT INTO project_role_module (
															  role_id,
															  module_id,
															  permission,
															  per_view,
															  per_edit,
															  per_delete
															)VALUES(
																".GF::quote($role_id).",
																".GF::quote($list['id']).",
																".GF::quote($permission).",
																".GF::quote($per_view).",
																".GF::quote($per_edit).",
																".GF::quote($per_delete)."
															)";

						$res = $db->Execute($sql);
						if($list['module_type']=='M'){
							foreach($list['item'] as $items){
								$permission = 'D';
								$per_view = 'D';
								$per_edit = 'D';
								$per_delete = 'D';

								$key_permission = array_search($items['id'],$allow_item);
								$key_view = array_search($items['id'],$view_item);
								$key_edit = array_search($items['id'],$edit_item);
								$key_delete = array_search($items['id'],$delete_item);

								if($key_permission !== false){
									$permission = 'A';
								}
								if($key_view !== false){
									$per_view = 'A';
								}
								if($key_edit !== false){
									$per_edit = 'A';
								}
								if($key_delete !== false){
									$per_delete = 'A';
								}
								$sql = "INSERT INTO project_role_item (
																	  role_id,
																	  item_id,
																	  permission,
																	  per_view,
																	  per_edit,
																	  per_delete
																	)VALUES(
																		".GF::quote($role_id).",
																		".GF::quote($items['id']).",
																		".GF::quote($permission).",
																		".GF::quote($per_view).",
																		".GF::quote($per_edit).",
																		".GF::quote($per_delete)."
																	)";

								$res = $db->Execute($sql);
							}
						}
				}
				return true;
			}else{
				return false;
			}
		}
		private function _groupInfomation(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$role_id = $base->get('_ids');
	 		if($base->get('_ids_')!=''){
				$role_id = $base->get('_ids_');
			}
	 		//echo $role_id;
	 		if($role_id!=''){
				$sql = "SELECT * FROM project_role WHERE id=".GF::quote($role_id);

				//echo $sql;

				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);
				$arrReturn = array();
				$arrReturn['role_id'] = $res->fields['id'];
				$arrReturn['role_name'] = $res->fields['role_name'];
				$arrReturn['email_notification'] = $res->fields['email_notification'];
				$arrReturn['email_account'] = $res->fields['email_account'];
				$base->set('_role_id_',$res->fields['id']);
				$arrReturn['module'] = $this->_roleModuleList();
				$arrReturn['item'] = $this->_roleItemList();

				//GF::print_r($arrReturn['module']);


				return $arrReturn;
			}else{
				return NULL;
			}
		}
		public function groupInfomation2(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();



				$role_id = $base->get('_ids_');


	 		if($role_id!=''){
				$sql = "SELECT * FROM project_role WHERE id=".GF::quote($role_id);

				//echo $sql;

				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);
				$arrReturn = array();
				$arrReturn['role_id'] = $res->fields['id'];
				$arrReturn['role_name'] = $res->fields['role_name'];
				$arrReturn['email_notification'] = $res->fields['email_notification'];
				$base->set('_role_id_',$res->fields['id']);
				$arrReturn['module'] = $this->_roleModuleList();
				$arrReturn['item'] = $this->_roleItemList();

				//GF::print_r($arrReturn['module']);


				return $arrReturn;
			}else{
				return NULL;
			}
		}
		private function _roleModuleList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$role_id = $base->get('_role_id_');

	 		$sql = "SELECT * FROM project_role_module WHERE role_id=".GF::quote($role_id);
	 		//echo $sql;
	 		$res = $db->Execute($sql);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['module_id'] = $res->fields['module_id'];
				$arrReturn[$i]['permission'] = $res->fields['permission'];
				$arrReturn[$i]['per_view'] = $res->fields['per_view'];
				$arrReturn[$i]['per_edit'] = $res->fields['per_edit'];
				$arrReturn[$i]['per_delete'] = $res->fields['per_delete'];

				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _roleItemList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$role_id = $base->get('_role_id_');

	 		$sql = "SELECT * FROM project_role_item WHERE role_id=".GF::quote($role_id);
	 		$res = $db->Execute($sql);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['item_id'] = $res->fields['item_id'];
				$arrReturn[$i]['permission'] = $res->fields['permission'];
				$arrReturn[$i]['per_view'] = $res->fields['per_view'];
				$arrReturn[$i]['per_edit'] = $res->fields['per_edit'];
				$arrReturn[$i]['per_delete'] = $res->fields['per_delete'];

				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _groupList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();

	 		$sql = "SELECT * FROM project_role WHERE status='O'";
	 		$res = $db->Execute($sql);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['role_id'] = $res->fields['id'];
				$arrReturn[$i]['role_name'] = $res->fields['role_name'];
				$base->set('_role_id',$res->fields['id']);
				$arrReturn[$i]['module'] = $this->_roleModuleList();
				$arrReturn[$i]['member'] = $member->memberListByGroup();
				
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _deleteGroup(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$sql = "UPDATE project_role SET status='C' WHERE id=".GF::quote($base->get('_ids'));
	 		
	 		//echo $sql;

	 		$res = $db->Execute($sql);
	 	}
		private function _updateUserPermission(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$user_id = $base->get('POST.user_id');
	 		$role_id = $base->get('POST.role_id');

	 		if(is_array($user_id)){
				foreach($user_id as $vals){
					$sql = "UPDATE project_user SET user_role_id=".GF::quote($role_id)." WHERE id=".GF::quote($vals);
	 				$res = $db->Execute($sql);
				}
				return true;
			}else{
				return true;
			}


		}


		private function _getLanguage(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_language   ORDER BY id ASC";
			$res = $db->Execute($sql);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['id'] = $res->fields['id'];
				$arrReturn[$i]['lang_name'] = $res->fields['lang_name'];
				$arrReturn[$i]['lang_thumb'] = $res->fields['lang_thumb'];
				$arrReturn[$i]['lang_lang'] = $res->fields['lang_lang'];
				$arrReturn[$i]['lang_prefix'] = $res->fields['lang_prefix'];
				$arrReturn[$i]['status'] = $res->fields['status'];
				$arrReturn[$i]['default'] = $res->fields['default'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _createLanguage(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
			$lang_lang = "_".strtolower($base->get('POST.lang_name'));
 			$sql = "INSERT INTO project_language (
 												lang_name,
 												lang_lang,
 												lang_prefix,
 												status
 												)VALUES(
 												".GF::quote($base->get('POST.lang_name')).",
 												".GF::quote($lang_lang).",
 												".GF::quote($base->get('POST.sub_name')).",
 												".GF::quote('O')."
 												)";
			//echo $sql;
			$res = $db->Execute($sql);
 			$lang_id = $db->Insert_ID();
				$picname = $_FILES['lang_pic']['name'];
				$file_name = $base->get('POST.sub_name')."_".$lang_id;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['lang_pic']['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['lang_pic']['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/language/";

					$dest_picname_o = $path_dir.$file_name.".".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 50,50)){
							$file_name = $file_name.".".$file_type;
							$sql = "UPDATE project_language SET lang_thumb=".GF::quote($file_name)." WHERE id=".GF::quote($lang_id);
							$res = $db->Execute($sql);
						}
					}else{
						$file_name = '';
					}
				}else{
					$file_name = '';
				}


 			return true;


		}
		private function _editLanguage(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
			$lang_lang = "_".strtolower($base->get('POST.lang_name'));
 			$sql = "UPDATE  project_language SET
 												lang_name=".GF::quote($base->get('POST.lang_name')).",
 												lang_lang=".GF::quote($lang_lang).",
 												lang_prefix=".GF::quote($base->get('POST.sub_name'))."
 												WHERE id=".GF::quote($base->get('POST.id'));
			//echo $sql;
			$res = $db->Execute($sql);
 			$lang_id =$base->get('POST.id');
				$picname = $_FILES['lang_pic']['name'];
				$file_name = $base->get('POST.sub_name')."_".$lang_id;
				//GF::print_r($file_name);
 				if(!empty($picname)){
 					if($base->get('POST.old_lang_pic')!=''){
						$path_dir = $base->get('BASEDIR_F')."/uploads/language/";
	 					list($a,$b) = explode(".",$base->get('POST.old_lang_pic'));
	 					$old_file= $a."_thumb.".$b;
						unlink($path_dir.$base->get('POST.old_lang_pic'));
						unlink($path_dir.$old_file);
					}
 					
					$Str_file = explode(".",$_FILES['lang_pic']['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);
					$tmp_file = $_FILES['lang_pic']['tmp_name'];
					$dest_picname_o = $path_dir.$file_name.".".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 50,50)){
							$file_name = $file_name.".".$file_type;
							$sql = "UPDATE project_language SET lang_thumb=".GF::quote($file_name)." WHERE id=".GF::quote($lang_id);
							echo $sql;
							$res = $db->Execute($sql);
						}
					}else{
						$file_name = '';
					}
				}else{
					$file_name = '';
				}


 			return true;


		}
		private function _getLangByID(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		
	 		$sql = "SELECT * FROM project_language WHERE id=".GF::quote($base->get('_ids'));
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['id'] = $res->fields['id'];
			$arrReturn['lang_name'] = $res->fields['lang_name'];
			$arrReturn['lang_thumb'] = $res->fields['lang_thumb'];
			$arrReturn['lang_lang'] = $res->fields['lang_lang'];
			$arrReturn['lang_prefix'] = $res->fields['lang_prefix'];
			$arrReturn['status'] = $res->fields['status'];
			$arrReturn['default'] = $res->fields['default'];
			$res->Close();
			return 	$arrReturn;
		}
		private function _delLang(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql ="UPDATE project_language SET status='C' WHERE  id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
	 		
		}
		private function _statusLanguage(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql ="UPDATE project_language SET status=".GF::quote($base->get('POST.status'))." WHERE  id=".GF::quote($base->get('POST.id'));
	 		$res = $db->Execute($sql);
	 	}


		private function _getLanguageList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$cond ='';
	 		if(!empty($_SESSION['lang_content']['content_name'])){
	 			$name = $_SESSION['lang_content']['content_name'];
				$cond .=" AND layout_name LIKE '%".$name."%'";
			}
			if(!empty($_SESSION['lang_content']['content_prefix'])){
	 			$prefix = $_SESSION['lang_content']['content_prefix'];
				$cond .=" AND layout_desc_th LIKE '%".$prefix."%'";
			}
			if(!empty($_SESSION['lang_content']['status'])){
	 			$cond .=" AND active_status=".GF::quote($_SESSION['lang_content']['status']);
			}
	 		$sql = "SELECT * FROM project_language_layout WHERE status='O' $cond ORDER BY id ASC";
	 		//echo $sql;
			$res = $db->Execute($sql);
			$count = 0;
				while(!$res->EOF){
					$count++;
					$res->MoveNext();
				}
				$res->Close();

				$base->set('allPage',ceil($count/10));

			$page = $base->get('GET.page');

			$numr = 10;
			$start = "";
			$end = "";
			if($page==1||empty($page)){
				$start = 0;
				$page = 1;
				//$end = $numr;
			}else{
				//$end = ($page*$numr);
				$start = ($page*$numr)-$numr;
			}
			 $cond = " LIMIT ".$start.",".$numr;

			 $base->set('currpage',$page);

			$res = $db->Execute($sql.$cond);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['id'] = $res->fields['id'];
				$arrReturn[$i]['layout_name'] = $res->fields['layout_name'];
				$arrReturn[$i]['layout_prefix'] = $res->fields['layout_prefix'];
				$arrReturn[$i]['active_status'] = $res->fields['active_status'];
				$arrReturn[$i]['layout_desc_th'] = $res->fields['layout_desc_th'];
				if($res->fields['update_dtm']=="0000-00-00" || empty($res->fields['update_dtm'])){
					$arrReturn[$i]['update_dtm'] = "-";
					$arrReturn[$i]['update_dtm_time'] ='';
				}else{
					$arrReturn[$i]['update_dtm'] = date('d-m-Y',strtotime($res->fields['update_dtm']));
					$arrReturn[$i]['update_dtm_time'] = date('H:i:s',strtotime($res->fields['update_dtm']));
				}
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _createLanguageList(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
			$lang_lang = "_".strtolower($base->get('POST.lang_name'));
 			$sql = "INSERT INTO project_language_layout (
 												layout_name,
 												layout_prefix,
 												status,
 												active_status,
 												create_dtm,
 												create_by
 												)VALUES(
 												".GF::quote($base->get('POST.layuot_name')).",
 												".GF::quote($base->get('POST.prefix_name')).",
 												'O',
 												'O',
 												NOW(),
 												".GF::quote($user_id)."
 												)";
			//echo $sql;
			$res = $db->Execute($sql);
 			$layout_id = $db->Insert_ID();
			$lang = $this->getLanguage();
			foreach($lang as $value){
				$prefix = $value['lang_prefix'];
				$sql = "UPDATE  project_language_layout SET 
												layout_desc_$prefix=".GF::quote($base->get('POST.menu_name_'.$prefix))."
 												WHERE id=".GF::quote($layout_id);
				//echo $sql;
				$res = $db->Execute($sql);
			}
 			return true;


		}
		private function _editLanguageList(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
			$sql = "UPDATE  project_language_layout SET
 												layout_name=".GF::quote($base->get('POST.layuot_name')).",
 												layout_prefix=".GF::quote($base->get('POST.prefix_name')).",
 												update_dtm=NOW(),
 												update_by=".GF::quote($user_id)."
 												WHERE id=".GF::quote($base->get('POST.id'));
			//echo $sql;
			$res = $db->Execute($sql);
 			$lang = $this->getLanguage();
			foreach($lang as $value){
				$prefix = $value['lang_prefix'];
				$sql = "UPDATE  project_language_layout SET 
												layout_desc_$prefix=".GF::quote($base->get('POST.menu_name_'.$prefix))."
 												WHERE id=".GF::quote($base->get('POST.id'));
				//echo $sql;
				$res = $db->Execute($sql);
			}
 			return true;


		}
		private function _getLangByIDList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$lang = $this->getLanguage();
	 		$sql = "SELECT * FROM project_language_layout WHERE id=".GF::quote($base->get('_ids'));
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['id'] = $res->fields['id'];
			$arrReturn['layout_name'] = $res->fields['layout_name'];
			$arrReturn['layout_prefix'] = $res->fields['layout_prefix'];
			foreach($lang as $value){
				$prefix = $value['lang_prefix'];
				$arrReturn['layout_desc_'.$prefix] = $res->fields['layout_desc_'.$prefix];
			}
			$res->Close();
			return 	$arrReturn;
		}
		private function _delLangList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
	 		$sql ="UPDATE project_language_layout SET status='C',update_dtm=NOW(),update_by=".GF::quote($user_id)." WHERE  id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
	 		
		}
		private function _statusLanguageList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
	 		$sql ="UPDATE project_language_layout SET active_status=".GF::quote($base->get('POST.status')).",update_dtm=NOW(),update_by=".GF::quote($user_id)." WHERE  id=".GF::quote($base->get('POST.id'));
	 		$res = $db->Execute($sql);
	 	}
	 	private function _createBankList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$sql = "INSERT INTO project_bank (
												  status,
												  active_status,
												  create_dtm,
												  create_by,
												  update_dtm,
												  update_by
												)VALUES(
													'O',
													'O',
													NOW(),
													".GF::quote($user_id).",
													NOW(),
													".GF::quote($user_id)."
												)";

			$res = $db->Execute($sql);
 			$bank_id = $db->Insert_ID();

 			$langlist = GF::langlist();

 			$random_number = GF::randomNumb(20);

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];

 				$picname = $_FILES['bank_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['bank_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['bank_thumb_'.$lang_prefix]['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/banklist/";

					$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 150, 150)){
							$file_name = $file_name."_thumb.".$file_type;
						}
					}else{
						$file_name = '';
					}
				}else{
					$file_name = '';
				}



				$sql = "UPDATE project_bank SET
											  bank_image_".$lang_prefix."=".GF::quote($file_name).",
											  bank_name_".$lang_prefix."=".GF::quote($base->get('POST.bank_name_'.$lang_prefix)).",
											  bank_desc_".$lang_prefix."=".GF::quote($base->get('POST.bank_id_'.$lang_prefix))."
											 WHERE bank_id=".GF::quote($bank_id);
				////echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;
		}
		private function _getBankList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['banklist']['bank_name']!=''){
				$cond_select .= ' AND bank_name_'.GF::langdefault()." LIKE '%".$_SESSION['banklist']['bank_name']."%'";
			}
			if($_SESSION['banklist']['active_status']!=''){
				$cond_select .= ' AND active_status='.GF::quote($_SESSION['banklist']['active_status']);
			}

			$sql = "SELECT * FROM project_bank WHERE status='O' ".$cond_select." ORDER BY bank_sort ASC,create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);
			$count = 0;
				while(!$res->EOF){
					$count++;
					$res->MoveNext();
				}
				$res->Close();

				$base->set('allPage',ceil($count/10));

			$page = $base->get('GET.page');

			$numr = 10;
			$start = "";
			$end = "";
			if($page==1||empty($page)){
				$start = 0;
				$page = 1;
				//$end = $numr;
			}else{
				//$end = ($page*$numr);
				$start = ($page*$numr)-$numr;
			}
			 $cond = " LIMIT ".$start.",".$numr;

			 $base->set('currpage',$page);

			$res = $db->Execute($sql.$cond);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['bank_id'] = $res->fields['bank_id'];
				$arrReturn[$i]['bank_image'] = $res->fields['bank_image_'.GF::langdefault()];
				$arrReturn[$i]['bank_name'] = $res->fields['bank_name_'.GF::langdefault()];
				$arrReturn[$i]['bank_id_card'] = $res->fields['bank_desc_'.GF::langdefault()];
				$arrReturn[$i]['bank_sort'] = $res->fields['bank_sort'];
				$arrReturn[$i]['active_status'] = $res->fields['active_status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}
		private function _updateSortBanklist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_bank SET
										bank_sort=".GF::quote($base->get('GET.sort')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE bank_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}
		private function _updateStatusBanklist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_bank SET
										active_status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE bank_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getBankListByID(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_bank WHERE bank_id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _editbanklist(){

			//GF::print_r($base->get('POST'));
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$bank_id = $base->get('POST.bank_id');

 			$langlist = GF::langlist();

 			$random_number = GF::randomNumb(20);

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];

 				$picname = $_FILES['bank_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['bank_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['bank_thumb_'.$lang_prefix]['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/banklist/";

					$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 150, 150)){
							$file_name = $file_name."_thumb.".$file_type;
						}
						unlink($path_dir.$base->get('POST.old_thumb_'.$lang_prefix));
						unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_thumb_'.$lang_prefix)));
					}else{
						$file_name = $base->get('POST.old_thumb_'.$lang_prefix);
					}
				}else{
					$file_name = $base->get('POST.old_thumb_'.$lang_prefix);
				}



				$sql = "UPDATE project_bank SET
													  bank_image_".$lang_prefix."=".GF::quote($file_name).",
													  bank_name_".$lang_prefix."=".GF::quote($base->get('POST.bank_name_'.$lang_prefix)).",
													  bank_desc_".$lang_prefix."=".GF::quote($base->get('POST.bank_id_'.$lang_prefix)).",
													  update_dtm=NOW(),
													  update_by=".GF::quote($user_id)."
													  WHERE bank_id=".GF::quote($bank_id);
				//echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;


		}
		private function _delbanklist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_bank SET
										status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE bank_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _createFaqList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$sql = "INSERT INTO project_faq (
												  status,
												  active_status,
												  create_dtm,
												  create_by,
												  update_dtm,
												  update_by
												)VALUES(
													'O',
													'O',
													NOW(),
													".GF::quote($user_id).",
													NOW(),
													".GF::quote($user_id)."
												)";

			$res = $db->Execute($sql);
 			$faq_id = $db->Insert_ID();

 			$langlist = GF::langlist();
 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
				if($base->get('POST.meta_title_'.$lang_prefix)==""){
					$meta_title = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_title = $base->get('POST.meta_title_'.$lang_prefix);
				}
 				if($base->get('POST.meta_keyword_'.$lang_prefix)==""){
					$meta_keyword = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_keyword = $base->get('POST.meta_keyword_'.$lang_prefix);
				}
				if($base->get('POST.meta_desc_'.$lang_prefix)==""){
					$meta_desc = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_desc = $base->get('POST.meta_desc_'.$lang_prefix);
				}
 				$sql = "UPDATE project_faq SET
											  faq_name_".$lang_prefix."=".GF::quote($base->get('POST.faq_name_'.$lang_prefix)).",
											  faq_desc_".$lang_prefix."=".GF::quote($base->get('POST.faq_desc_'.$lang_prefix)).",
											  meta_title_".$lang_prefix."=".GF::quote($meta_title).",
											  meta_keyword_".$lang_prefix."=".GF::quote($meta_keyword).",
											  meta_desc_".$lang_prefix."=".GF::quote($meta_desc)."
											 WHERE faq_id=".GF::quote($faq_id);
				$res = $db->Execute($sql);
			}

 			return true;
		}

		private function _getFaqList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['faqlist']['faq_name']!=''){
				$cond_select .= ' AND faq_name_'.GF::langdefault()." LIKE '%".$_SESSION['faqlist']['faq_name']."%'";
			}
			if($_SESSION['faqlist']['active_status']!=''){
				$cond_select .= ' AND active_status='.GF::quote($_SESSION['faqlist']['active_status']);
			}

			$sql = "SELECT * FROM project_faq WHERE status='O' ".$cond_select." ORDER BY faq_sort ASC,create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);
			$count = 0;
				while(!$res->EOF){
					$count++;
					$res->MoveNext();
				}
				$res->Close();

				$base->set('allPage',ceil($count/10));

			$page = $base->get('GET.page');

			$numr = 10;
			$start = "";
			$end = "";
			if($page==1||empty($page)){
				$start = 0;
				$page = 1;
				//$end = $numr;
			}else{
				//$end = ($page*$numr);
				$start = ($page*$numr)-$numr;
			}
			 $cond = " LIMIT ".$start.",".$numr;

			 $base->set('currpage',$page);

			$res = $db->Execute($sql.$cond);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['faq_id'] = $res->fields['faq_id'];
				$arrReturn[$i]['faq_name'] = $res->fields['faq_name_'.GF::langdefault()];
				$arrReturn[$i]['faq_desc'] = $res->fields['faq_desc_'.GF::langdefault()];
				$arrReturn[$i]['faq_sort'] = $res->fields['faq_sort'];
				$arrReturn[$i]['faq_view'] = $res->fields['faq_view'];
				$arrReturn[$i]['active_status'] = $res->fields['active_status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;

		}
		private function _updateSortFaqlist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_faq SET
										faq_sort=".GF::quote($base->get('GET.sort')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE faq_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _updateStatusFaqlist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_faq SET
										active_status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE faq_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getFaqListByID(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_faq WHERE faq_id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _editFaqlist(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$faq_id = $base->get('POST.faq_id');

 			$langlist = GF::langlist();
			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
				if($base->get('POST.meta_title_'.$lang_prefix)==""){
					$meta_title = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_title = $base->get('POST.meta_title_'.$lang_prefix);
				}
 				if($base->get('POST.meta_keyword_'.$lang_prefix)==""){
					$meta_keyword = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_keyword = $base->get('POST.meta_keyword_'.$lang_prefix);
				}
				if($base->get('POST.meta_desc_'.$lang_prefix)==""){
					$meta_desc = $base->get('POST.faq_name_'.$lang_prefix);
				}else{
					$meta_desc = $base->get('POST.meta_desc_'.$lang_prefix);
				}
 				$sql = "UPDATE project_faq SET
											  faq_name_".$lang_prefix."=".GF::quote($base->get('POST.faq_name_'.$lang_prefix)).",
											  faq_desc_".$lang_prefix."=".GF::quote($base->get('POST.faq_desc_'.$lang_prefix)).",
											  meta_title_".$lang_prefix."=".GF::quote($meta_title).",
											  meta_keyword_".$lang_prefix."=".GF::quote($meta_keyword).",
											  meta_desc_".$lang_prefix."=".GF::quote($meta_desc)."
											 WHERE faq_id=".GF::quote($faq_id);
				$res = $db->Execute($sql);
			}

 			return true;


		}
		private function _delFaqlist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_faq SET
										status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE faq_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getVatByID(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_vat WHERE vat_id='1'";
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _updateStatusVat(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$sql = "UPDATE project_vat SET
										status=".GF::quote($base->get('GET.status'))."
										WHERE vat_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _updatevat(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_vat SET
										vat_value=".GF::quote($base->get('POST.vat_value'))."
										WHERE vat_id='1'";
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _createSocialList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$sql = "INSERT INTO project_social (
												 status,
												  active_status,
												  create_dtm,
												  create_by,
												  update_dtm,
												  update_by
												)VALUES(
													'O',
													'O',
													NOW(),
													".GF::quote($user_id).",
													NOW(),
													".GF::quote($user_id)."
												)";

			$res = $db->Execute($sql);
 			$social_id = $db->Insert_ID();

 			$langlist = GF::langlist();
 			
 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
				$sql = "UPDATE project_social SET
											  icon_".$lang_prefix."=".GF::quote($base->get('POST.icon_'.$lang_prefix)).",
											  social_name_".$lang_prefix."=".GF::quote($base->get('POST.social_name_'.$lang_prefix)).",
											  social_link_".$lang_prefix."=".GF::quote($base->get('POST.social_link_'.$lang_prefix))."
											  WHERE social_id=".GF::quote($social_id);
											  
				$res = $db->Execute($sql);
			}

 			return true;
		}
		private function _editSocialList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$langlist = GF::langlist();
 			
 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
				$sql = "UPDATE project_social SET
											  icon_".$lang_prefix."=".GF::quote($base->get('POST.icon_'.$lang_prefix)).",
											  social_name_".$lang_prefix."=".GF::quote($base->get('POST.social_name_'.$lang_prefix)).",
											  social_link_".$lang_prefix."=".GF::quote($base->get('POST.social_link_'.$lang_prefix))."
											  WHERE social_id=".GF::quote($base->get('POST.social_id'));
											  
				$res = $db->Execute($sql);
			}
			$sql = "UPDATE project_social SET
											  update_dtm= NOW(),
											  update_by=".GF::quote($user_id)."
											  WHERE social_id=".GF::quote($base->get('POST.social_id'));
														  
							$res = $db->Execute($sql);
 			return true;

		}
		private function _getSocialList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$cond_select = '';
	 		if($_SESSION['social']['social_name']!=''){
				$cond_select .= ' AND social_name_'.GF::langdefault()." LIKE '%".$_SESSION['social']['social_name']."%'";
			}
			if($_SESSION['social']['active_status']!=''){
				$cond_select .= ' AND active_status='.GF::quote($_SESSION['social']['active_status']);
			}

			$sql = "SELECT * FROM project_social WHERE status='O' ".$cond_select." ORDER BY social_sort ASC,create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);
			$count = 0;
				while(!$res->EOF){
					$count++;
					$res->MoveNext();
				}
				$res->Close();

				$base->set('allPage',ceil($count/10));

			$page = $base->get('GET.page');

			$numr = 10;
			$start = "";
			$end = "";
			if($page==1||empty($page)){
				$start = 0;
				$page = 1;
				//$end = $numr;
			}else{
				//$end = ($page*$numr);
				$start = ($page*$numr)-$numr;
			}
			 $cond = " LIMIT ".$start.",".$numr;

			 $base->set('currpage',$page);

			$res = $db->Execute($sql.$cond);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['social_id'] = $res->fields['social_id'];
				$arrReturn[$i]['social_name'] = $res->fields['social_name_'.GF::langdefault()];
				$arrReturn[$i]['social_link'] = $res->fields['social_link_'.GF::langdefault()];
				$arrReturn[$i]['social_sort'] = $res->fields['social_sort'];
				$arrReturn[$i]['social_icon'] = $res->fields['icon_'.GF::langdefault()];
				$arrReturn[$i]['active_status'] = $res->fields['active_status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			//GF::print_r($arrReturn);
			return 	$arrReturn;
		}
		private function _updateStatusSociallist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$sql = "UPDATE project_social SET
										active_status=".GF::quote($base->get('GET.status'))."
										WHERE social_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _updateSortSociallist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_social SET
										social_sort=".GF::quote($base->get('GET.sort')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE social_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getSocialByID(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_social WHERE social_id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _delSociallist(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_social SET
										status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE social_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getContactFrm(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_form_contact WHERE id='1'";
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _createContactFrm(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$sql = "UPDATE project_form_contact SET
										email=".GF::quote($base->get('POST.email')).",
										email_cc=".GF::quote($base->get('POST.email_cc')).",
										email_bcc=".GF::quote($base->get('POST.email_bcc')).",
										tel=".GF::quote($base->get('POST.tel_frm'))."
										WHERE id='1'";
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _getPaysbuyList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['paysbuylist']['paysbuy_name']!=''){
				$cond_select .= ' AND paysbuy_name_'.GF::langdefault()." LIKE '%".$_SESSION['paysbuylist']['paysbuy_name']."%'";
			}
			if($_SESSION['paysbuylist']['active_status']!=''){
				$cond_select .= ' AND active_status='.GF::quote($_SESSION['paysbuylist']['active_status']);
			}

			$sql = "SELECT * FROM project_paysbuylist WHERE status='O' ".$cond_select." ORDER BY paysbuy_sort ASC,create_dtm DESC";
//			echo $sql; 
			$res = $db->Execute($sql);
			$count = 0;
				while(!$res->EOF){
					$count++;
					$res->MoveNext();
				}
				$res->Close();

				$base->set('allPage',ceil($count/10));

			$page = $base->get('GET.page');

			$numr = 10;
			$start = "";
			$end = "";
			if($page==1||empty($page)){
				$start = 0;
				$page = 1;
				//$end = $numr;
			}else{
				//$end = ($page*$numr);
				$start = ($page*$numr)-$numr;
			}
			 $cond = " LIMIT ".$start.",".$numr;

			 $base->set('currpage',$page);

			$res = $db->Execute($sql.$cond);
			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['paysbuy_id'] = $res->fields['paysbuy_id'];
				$arrReturn[$i]['paysbuy_name'] = $res->fields['paysbuy_name_'.GF::langdefault()];
				$arrReturn[$i]['paysbuy_image'] = $res->fields['paysbuy_image_'.GF::langdefault()];
				$arrReturn[$i]['paysbuy_id_fix'] = $res->fields['paysbuy_id_fix_'.GF::langdefault()];
				$arrReturn[$i]['paysbuy_sort'] = $res->fields['paysbuy_sort'];
				$arrReturn[$i]['active_status'] = $res->fields['active_status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}
		private function _createPaysbuy(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			//GF::print_r($base->get('POST'));die();
 			$sql = "INSERT INTO project_paysbuylist(
 												  status,
												  active_status,
												  create_dtm,
												  create_by,
												  update_dtm,
												  update_by
												)VALUES(
													'O',
													'O',
													NOW(),
													".GF::quote($user_id).",
													NOW(),
													".GF::quote($user_id)."
												)";

			$res = $db->Execute($sql);
 			$paysbuy_id = $db->Insert_ID();

 			$langlist = GF::langlist();

 			$random_number = GF::randomNumb(20);

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
 				$picname = $_FILES['paysbuy_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['paysbuy_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);
					$tmp_file = $_FILES['paysbuy_thumb_'.$lang_prefix]['tmp_name'];
					$path_dir = $base->get('BASEDIR_F')."/uploads/paysbuylist/";
					$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;
					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 150, 150)){
							$file_name = $file_name."_thumb.".$file_type;
						}
					}else{
						$file_name = '';
					}
				}else{
					$file_name = '';
				}
				
				$sql = "UPDATE project_paysbuylist SET
				 							  paysbuy_image_".$lang_prefix."=".GF::quote($file_name).",
				 							  paysbuy_id_fix_".$lang_prefix."=".GF::quote($base->get('POST.paysbuy_id_fix_'.$lang_prefix)).",
											  paysbuy_name_".$lang_prefix."=".GF::quote($base->get('POST.paysbuy_name_'.$lang_prefix))."
											  WHERE paysbuy_id=".GF::quote($paysbuy_id);
				////echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;
		}
		private function _editPaysbuy(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$langlist = GF::langlist();
 			$random_number = GF::randomNumb(20);
			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];
 				$picname = $_FILES['paysbuy_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['paysbuy_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['paysbuy_thumb_'.$lang_prefix]['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/paysbuylist/";

					$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
					$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

					if(copy($tmp_file, $dest_picname_o)){
						$thumb = new ThumbnailRC($dest_picname_o);
						if($thumb->resize($dest_picname_t, 150, 150)){
							$file_name = $file_name."_thumb.".$file_type;
						}
					}else{
						$file_name = '';
					}
				}else{
					$file_name = '';
				}
				$sql = "UPDATE project_paysbuylist SET
											  paysbuy_image_".$lang_prefix."=".GF::quote($file_name).",
				 							  paysbuy_id_fix_".$lang_prefix."=".GF::quote($base->get('POST.paysbuy_id_fix_'.$lang_prefix)).",
											  paysbuy_name_".$lang_prefix."=".GF::quote($base->get('POST.paysbuy_name_'.$lang_prefix))."
											  WHERE paysbuy_id=".GF::quote($base->get('POST.paysbuy_id'));
				////echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;
		}
		private function _getPaysbuyByID(){
				$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		$sql = "SELECT * FROM project_paysbuylist WHERE paysbuy_id=".GF::quote($base->get('_ids'));
	 		$res = $db->Execute($sql);
			return $res->fields;
		}
		private function _updateStatusPaysbuy(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$sql = "UPDATE project_paysbuylist SET
										active_status=".GF::quote($base->get('GET.status'))."
										WHERE paysbuy_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _updateSortPaysbuy(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_paysbuylist SET
										paysbuy_sort=".GF::quote($base->get('GET.sort')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE paysbuy_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		private function _delPaysbuy(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
			$member = new Member();
			$memberInfomation = $member->memberInfomation();
			$user_id = $memberInfomation['id'];
			$sql = "UPDATE project_paysbuylist SET
										status=".GF::quote($base->get('GET.status')).",
										update_dtm=NOW(),
										update_by=".GF::quote($user_id)."
										WHERE paysbuy_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
		}
		// General Setting
		private function _getGeneral_info(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();

			$sql="SELECT * FROM project_general_web WHERE general_id='1'";
			$res = $db->Execute($sql);

 			return $res->fields;
		}

		private function _updateGeneral_gray(){
			$base = Base::getInstance();
			$db = DB::getInstance()->condb();

			$general_id = $base->get('POST.general_id');
			$general_gray = $base->get('POST.general_gray');
			
			if(!empty($general_gray)){
				$general_gray = "Y";
			}else{
				$general_gray = "N";
			}

			$sql="UPDATE project_general_web SET general_gray='$general_gray' WHERE general_id='$general_id'";
			$res = $db->Execute($sql);

 			return true;
		}

		private function _getMeta_info(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();

			$sql="SELECT * FROM project_meta_home WHERE meta_id='1'";
			$res = $db->Execute($sql);

 			return $res->fields;
		}

		private function _updateMeta_home(){
			$base = Base::getInstance();
			$db = DB::getInstance()->condb();

			$meta_id = $base->get('POST.meta_id');
			
			$langlist = GF::langlist();

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];

				$sql = "UPDATE project_meta_home SET
													  meta_title_".$lang_prefix."=".GF::quote($base->get('POST.meta_title_'.$lang_prefix)).",
													  meta_desc_".$lang_prefix."=".GF::quote($base->get('POST.meta_desc_'.$lang_prefix)).",
													  meta_keyword_".$lang_prefix."=".GF::quote($base->get('POST.meta_keyword_'.$lang_prefix))."
													  WHERE meta_id=".GF::quote($meta_id);
				$res = $db->Execute($sql);
			}

 			return true;
		}
} 
?>
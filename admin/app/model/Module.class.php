<?php
 class Module {
 	
 	public function moduleList(){
		$resultreturn = $this->_moduleList();
		return $resultreturn;
	}
	public function moduleListByPermission(){
		$resultreturn = $this->_moduleListByPermission();
		return $resultreturn;
	}
	public function moduleInfomation(){
		$resultreturn = $this->_moduleInfomation();
		return $resultreturn;
	}
	public function languageList(){
		$resultreturn = $this->_langList();
		return $resultreturn;
	}
 	
 	private function _moduleList(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();
		
		$sql = "SELECT * FROM project_module WHERE status='O' AND active_status='O' ORDER BY sort ASC"; 
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['module_name'] = $res->fields['module_name'];
			$RowsList[$i]['id'] = $res->fields['id'];
			$RowsList[$i]['module_type'] = $res->fields['module_type'];
			$RowsList[$i]['module_prefix'] = $res->fields['module_prefix'];
			$RowsList[$i]['lang_key'] = $res->fields['lang_key'];
			$RowsList[$i]['icon'] = $res->fields['icon'];
			$RowsList[$i]['item'] = $this->_moduleItemList($res->fields['id']);
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;
		
	}
	private function _moduleListByPermission(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();
		
		$member = new Member();
		$memberInfomation = $member->memberInfomation();
		
		$setting = new SSetting();
		$base->set('_ids_',$memberInfomation['user_role_id']);
		$groupInfomation = $setting->groupInfomation2();
		
		//GF::print_r($groupInfomation);
		
		$sql = "SELECT * FROM project_module WHERE status='O' AND active_status='O' ORDER BY sort ASC"; 
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$keymodule = 'D';
			foreach($groupInfomation['module'] as $key=>$vals){
				if($vals['module_id']==$res->fields['id']){
					if($vals['permission']=='A'){
						$keymodule = 'A';
					}
					
				}
			}
			if($keymodule=='A'){
				$RowsList[$i]['module_name'] = $res->fields['module_name'];
				$RowsList[$i]['id'] = $res->fields['id'];
				$RowsList[$i]['module_type'] = $res->fields['module_type'];
				$RowsList[$i]['module_prefix'] = $res->fields['module_prefix'];
				$RowsList[$i]['lang_key'] = $res->fields['lang_key'];
				$RowsList[$i]['icon'] = $res->fields['icon'];
				$RowsList[$i]['item'] = $this->_moduleItemListByPermission($res->fields['id'],$groupInfomation);
				$i++;
			}
			
			$res->MoveNext();
		}
		 return  $RowsList;
		
	}
	private function _moduleItemListByPermission($module_id,$groupInfomation){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();
		
		/*$member = new Member();
		$memberInfomation = $member->memberInfomation();
		
		$setting = new SSetting();
		$base->set('_ids_',$memberInfomation['user_role_id']);
		$groupInfomation = $setting->groupInfomation();*/
		//GF::print_r($memberInfomation['user_role_id']);
		
		$sql = "SELECT * FROM project_module_item WHERE module_id=".GF::quote($module_id)." AND status='O' AND active_status='O' ORDER BY sort ASC"; 
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$keymodule = 'D';
			foreach($groupInfomation['item'] as $key=>$vals){
				if($vals['item_id']==$res->fields['id']){
					if($vals['permission']=='A'){
						$keymodule = 'A';
						//echo $vals['item_id'];
					}
					
				}
			}
			if($keymodule=='A'){
				$RowsList[$i]['item_name'] = $res->fields['item_name'];
				$RowsList[$i]['id'] = $res->fields['id'];
				$RowsList[$i]['item_prefix'] = $res->fields['item_prefix'];
				$RowsList[$i]['lang_key'] = $res->fields['lang_key'];
				$RowsList[$i]['icon'] = $res->fields['icon'];
				$i++;
			}
			
			$res->MoveNext();
		}
		 return  $RowsList;
		
	}
	
	private function _moduleItemList($module_id){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();
		
		$sql = "SELECT * FROM project_module_item WHERE module_id=".GF::quote($module_id)." AND status='O' AND active_status='O' ORDER BY sort ASC"; 
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['item_name'] = $res->fields['item_name'];
			$RowsList[$i]['id'] = $res->fields['id'];
			$RowsList[$i]['item_prefix'] = $res->fields['item_prefix'];
			$RowsList[$i]['lang_key'] = $res->fields['lang_key'];
			$RowsList[$i]['icon'] = $res->fields['icon'];
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;
		
	}
	private function _moduleInfomation(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();
	 		
	 		
	 		$module_id = $base->get('_module_id_');
	 		if($module_id!=''){
				$sql = "SELECT * FROM project_module WHERE id=".GF::quote($module_id); 
				//echo $sql;
				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);
				$arrReturn = array();
				$arrReturn['module_name'] = $res->fields['module_name'];
				$arrReturn['id'] = $res->fields['id'];
				$arrReturn['module_type'] = $res->fields['module_type'];
				$arrReturn['module_prefix'] = $res->fields['module_prefix'];
				$RowsList['lang_key'] = $res->fields['lang_key'];
				$arrReturn['icon'] = $res->fields['icon'];

				return $arrReturn;
			}else{
				return NULL;
			}
	}
	private function _langList(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();
		
		$sql = "SELECT * FROM project_language WHERE status='O' "; 
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$res = $db->Execute($sql);
		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['lang_name'] = $res->fields['lang_name'];
			$RowsList[$i]['lang_prefix'] = $res->fields['lang_prefix'];
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;
		
	}
	
 }
?>
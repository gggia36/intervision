<?php
	class Permission {
		protected $module_ids;
		private $set_permission = array();
	 	private $set_view = array();
	 	private $set_edit = array();
	 	private $set_delete = array();
	 	
	 	protected function set_permission($varible,$values){
			$this->set_permission[$varible] = $values;
		}
		protected function set_view($varible,$values){
			$this->set_view[$varible] = $values;
		}
		protected function set_edit($varible,$values){
			$this->set_edit[$varible] = $values;
		}
		protected function set_delete($varible,$values){
			$this->set_delete[$varible] = $values;
		}
		
		protected function PermissionAuth(){
			$base = Base::getInstance();
			$setting = new SSetting();
			$member = new Member();
			$module = new Module();
			
			$base->set('_module_id_',$this->module_ids);
			$moduleInfomation = $module->moduleInfomation();
			
			$memberinfomation = $member->memberInfomation();
			$base->set('_ids_',$memberinfomation['user_role_id']);
			$moduleList = $setting->groupInfomation2();
			
			$routeMethod = $base->get('_method_');
			
			if($moduleInfomation['module_type']=='S'){
				//$methodModule = array_search(NULL,$this->set_permission);
				$methodModule = '';
				foreach($this->set_permission as $key=>$vals){
					if($key==$routeMethod){
						$methodModuleid = $vals;
					}
				}
				if($methodModule==NULL){
					
						foreach($moduleList['module'] as $keymod=>$modval){
							if($modval['module_id']==$this->module_ids){
								if($modval['permission']=='D'){
									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}else{
									//echo 'ssss';
									$base->set('button_view',true);
									$base->set('button_edit',true);
									$base->set('button_delete',true);
									if($modval['per_view']=='D'){
										$base->set('button_view',false);
									}
									if($modval['per_edit']=='D'){
										$base->set('button_edit',false);
									}
									if($modval['per_delete']=='D'){
										$base->set('button_delete',false);
									}
								}
							}
						}
					
				}
				
				$methodView = array_search(NULL,$this->set_view);
				if($methodView!==false){
					if($methodView==$routeMethod){
						foreach($moduleList['module'] as $keymod=>$modval){
							if($modval['module_id']==$this->module_ids){
								if($modval['per_view']=='D'){
									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}
							}
						}
					}
				}
				
				$methodEditArray = array();
				foreach($this->set_edit as $key=>$vals){
					if($vals==NULL){
						$methodEditArray[] = $key;
					}
				}
				$methodEdit = array_search($routeMethod,$methodEditArray);	
				if($methodEdit!==false){
						foreach($moduleList['module'] as $keymod=>$modval){
							if($modval['module_id']==$this->module_ids){
								if($modval['per_edit']=='D'){
									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}
							}
						}
				}
				
				$methodDeleteArray = array();
				foreach($this->set_delete as $key=>$vals){
					if($vals==NULL){
						$methodDeleteArray[] = $key;
					}
				}
				$methodDelete = array_search($routeMethod,$methodDeleteArray);	
				if($methodDelete!==false){
						foreach($moduleList['module'] as $keymod=>$modval){
							if($modval['module_id']==$this->module_ids){
								if($modval['per_delete']=='D'){
									return true;
									exit();
								}
							}
						}
				}
			}///End if S;
			if($moduleInfomation['module_type']=='M'){
				//$methodModule = array_search(NULL,$this->set_permission);
				$methodModuleid = '';
				foreach($this->set_permission as $key=>$vals){
					//echo $key;
					if($key==$routeMethod){
						$methodModuleid = $vals;
					}
				}
				if($methodModuleid!=''){

						foreach($moduleList['item'] as $keyitem=>$itemval){
							//echo $methodModuleid;
							if($itemval['item_id']==$methodModuleid){

								if($itemval['permission']=='D'){

									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}else{
									$base->set('button_view',true);
									$base->set('button_edit',true);
									$base->set('button_delete',true);

									if($itemval['per_view']=='D'){
										$base->set('button_view',false);
									}
									if($itemval['per_edit']=='D'){

										$base->set('button_edit',false);
									}
									if($itemval['per_delete']=='D'){
										$base->set('button_delete',false);
									}
									
								}
							}
						}
					
				}
				
				$methodViewid = '';
				foreach($this->set_view as $key=>$vals){
					if($key==$routeMethod){
						$methodViewid = $vals;
					}
				}
				if($methodViewid!=''){
						foreach($moduleList['item'] as $keyitem=>$itemval){
							if($itemval['item_id']==$methodViewid){
								if($itemval['per_view']=='D'){
									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}
							}
						}
					
				}
				
				$methodEditid = '';
				foreach($this->set_edit as $key=>$vals){
					if($key==$routeMethod){
						$methodEditid = $vals;
					}
				}

				if($methodEditid!=''){
						foreach($moduleList['item'] as $keyitem=>$itemval){
							if($itemval['item_id']==$methodEditid){
								if($itemval['per_edit']=='D'){
									Template::getInstance()->render('error/nopermission.htm');
									exit();
								}
							}
						}
					
				}
				$methodDeleteid = '';
				foreach($this->set_edit as $key=>$vals){
					if($key==$routeMethod){
						$methodDeleteid = $vals;
					}
				}
				if($methodDeleteid!=''){
						foreach($moduleList['item'] as $keyitem=>$itemval){
							if($itemval['item_id']==$methodDeleteid){
								if($itemval['per_delete']=='D'){
									return true;
									exit();
								}
							}
						}
					
				}
			}///End if M;
			
			
		}
	 	
	}
?>
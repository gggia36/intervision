<?php
 class Utility {

 	public function javascript($base){

		$modname = $base->get('_modname');
		$action = $base->get('_action');
		global $JS;

		echo json_encode($JS[$modname][$action]);

	}
	
	public function getDateNow($base){
		$date = date('d/m/Y H:i');
		echo $date;
	}
	public function filemanager($base){
		
		$utility = new SUtility();
		$folderList = $utility->summernote_ListFolder();
		$imagesList = $utility->imageList();
		
		//GF::print_r($imagesList);
		$base->set('imageList',$imagesList);
 		$base->set('folderList',$folderList);
		Template::getInstance()->render('utility_ui/filemanager.htm');
	}
	public function deleteimage($base){
		
		$utility = new SUtility();
		$utility->deleteImage();
		
	}
	public function deletefolder($base){
		
		$utility = new SUtility();
		$utility->deleteFolder();
		
	}
	public function filemanagerlistfolder($base){
		
		$utility = new SUtility();
		//GF::print_r($base->get('POST'));
		$folderList = $utility->summernote_ListFolder();
		$imagesList = $utility->imageList();
		
		//GF::print_r($imagesList);
		$base->set('imageList',$imagesList);
		$base->set('folderList',$folderList);
		Template::getInstance()->render('utility_ui/filemanager_folder.htm');
	}
	public function checkemail($base){
		$member = new Member();
		$result = $member->checkEmail();
		if($result){
			$res = array("result" => "P");
		}else{
			$res = array("result" => "F");
		}
		echo json_encode($res);
	}
	public function processFrm($base){
		$utility = new SUtility();
		$mode = $base->get('POST.mode_c');
		if($mode=='createfolder'){
			$result = $utility->createFolder();
			if($result){
				echo '<script>window.top.imageFolder2("'.$base->get('POST.folder_path').'");</script>';
			}else{
				echo "F";
			}
		}
		if($mode=='uploadimage'){
			$result = $utility->uploaImage();
			if($result){
				echo '<script>window.top.imageFolder2("'.$base->get('POST.folders_path').'");</script>';
			}else{
				echo '<script>window.top.alert("Error upload,Please try again.");</script>';
				echo '<script>window.top.imageFolder2("'.$base->get('POST.folders_path').'");</script>';
			}
		}
	}
	

 }
?>
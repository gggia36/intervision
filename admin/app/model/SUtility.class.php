<?php

	class SUtility {
		
		public function summernote_ListFolder(){
			$resultReturn = $this->_summernote_ListFolder();
			return $resultReturn;
		}
		public function imageList(){
			$resultReturn = $this->_imgList();
			return $resultReturn;
		}
		public function createFolder(){
			$resultReturn = $this->_createFolder();
			return $resultReturn;
		}
		public function deleteImage(){
			$resultReturn = $this->_deleteImage();
			return $resultReturn;
		}
		public function deleteFolder(){
			$resultReturn = $this->_deleteFOLDER();
			return $resultReturn;
		}
		public function uploaImage(){
			$resultReturn = $this->_uploadImage();
			return $resultReturn;
		}
		
		
		private function _summernote_ListFolder(){
			
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			
 			$sub_path = $base->get('GET.path');
 			/*if($sub_path!=''){
				$sub_path = base64_encode($sub_path);
			}*/
			//echo base64_decode($sub_path);
 			
			$path_dir = $base->get('BASEDIR_F')."/".$base->get('EDITOR_PATH').base64_decode(urldecode($sub_path));
			//echo $path_dir;
			$files = glob($path_dir.'/*/',GLOB_ONLYDIR);

			$ret = array();
			$i = 0;
			foreach($files as $file){ 

			 	$fdname = explode("/",$file);
			  	$ct = (count($fdname))-2;
				
				$ret[$i]['folder'] = $fdname[$ct];
				$ret[$i]['path'] = base64_decode(urldecode($sub_path));
					
					$i++;	
				
			}
			//GF::print_r($ret);
			return $ret;
			
			
		}
		private function _createFolder(){
			
			$base = Base::getInstance();
			
			$sub_path = $base->get('POST.folder_path');
			$path_dir = $base->get('BASEDIR_F')."/".$base->get('EDITOR_PATH').base64_decode(urldecode($sub_path));
			
			$fname = $base->get('POST.folder_name');
			//echo $fname;
			
			$fname = preg_replace('/\s+/', '', $fname);
			$create = mkdir($path_dir."/".$fname,0777,true);
			if($create){
				chmod($path_dir."/".$fname,0777);
				return true;
			}else{
				return false;
			}
		}
		private function _imgList(){
			
			$base = Base::getInstance();
			
			$sub_path = $base->get('GET.path');
			$path_dir = $base->get('BASEDIR_F')."/".$base->get('EDITOR_PATH').base64_decode(urldecode($sub_path));
			//echo $sub_path;
			$fname = $base->get('GET.foldername');
			$ckname = $base->get('BASEURL_F')."/".$base->get('EDITOR_PATH').base64_decode(urldecode($sub_path))."/".$fname;
			//echo $path_dir.'/'.$fname;
			
			$files = glob($path_dir.'/'.$fname."/*.*");		
				
			arsort($files);
			
			$ret = array();
			$i = 0;
			foreach($files as $file){ 
			  if(is_file($file))
			    $imgname = explode("/",$file);
				$ct = (count($imgname))-1;
				$ret[$i] = $ckname.$imgname[$ct];
				
				$i++;
				
			}
			
			return $ret;
		}
		private function _deleteImage(){
			
			$base = Base::getInstance();
			
			$pure_path = $base->get('GET.path');
			$strip_path = str_replace($ckname = $base->get('BASEURL_F')."/".$base->get('EDITOR_PATH'),'',$pure_path);
			$path_dir = $base->get('BASEDIR_F')."/".$base->get('EDITOR_PATH').$strip_path;
			//$path = PATHUPLOAD.'/'.$iname;
			$ret = unlink($path_dir);
			echo $ret;

		}
		private function _deleteFOLDER(){
			
			$base = Base::getInstance();
			
			$pure_path = $base->get('GET.path');
			$path_dir = $base->get('BASEDIR_F')."/".$base->get('EDITOR_PATH').base64_decode(urldecode($pure_path));
			
			$files = glob($path_dir."/*");
			
			foreach($files as $file){ 
			  if(is_file($file))
			    @unlink($file); 
			}
			//print_r($path_dir);
			$ret = @rmdir($path_dir);
			echo $ret;
		}
		
		private function _uploadImage(){
			$base = Base::getInstance();
			$Str_file = explode(".",$_FILES['file_img']['name']); 
			
			$file_type = end($Str_file);
			$tatal_name = count($Str_file);
			unset($Str_file[$tatal_name-1]);
			
			$pure_path = $base->get('POST.folders_path');
			$path_dir = $base->get('BASEDIR_F').$base->get('EDITOR_PATH').base64_decode(urldecode($pure_path));
			
			$new_name = $path_dir."/".time().implode('-',$Str_file).".".$file_type;

			//GF::print_r($_FILES['file_img']);
			/*if(copy($_FILES['file_img']['temp_name'],$new_name)){
				echo '1';
			}*/
			$move =  move_uploaded_file($_FILES['file_img']['tmp_name'], $new_name);
			if($move){
				return true;
			}else{
				return FALSE;
			}
			 
		}
		
		
	}

?>
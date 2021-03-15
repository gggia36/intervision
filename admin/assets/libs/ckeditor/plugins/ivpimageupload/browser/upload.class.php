<?php
class IVPUpload{
	public function createFD($fname){
		$fname = preg_replace('/\s+/', '', $fname);
		$create = mkdir(PATHUPLOAD."/".$fname,0777,true);
		if($create){
			chmod(PATHUPLOAD."/".$fname,0777);
			echo("1");
		}else{
			echo("0");
		}
	}
	/*private function _createjson($fname){
		$file_name = BASEDIR."upload/cont.json";
		$data = file_get_contents($file_name);
		$json_data = json_decode($data);
		$ei = 0;
		$data = array();
		foreach($json_data as $datas){
			$data[$ei]['folder'] = $datas->folder;
			$ei++;
		}
		$cc = $ei+1;
		$data[$cc]['folder'] = $fname;
		$json_data = json_encode($data);
		file_put_contents(BASEDIR."upload/cont.json", $json_data);
	}*/
	
	/*public function folder_list6(){
		$file_name = BASEDIR."upload/cont.json";
		$data = file_get_contents($file_name);
		$json_data = json_decode($data);
		$ei = 0;
		$data = array();
		foreach($json_data as $datas){
			$data[$ei] = $datas->folder;
			$ei++;
		}
		return $data;
	}*/
	public function imgList($fname){
		$ckname = $fname."/";
		if($fname=="root"){
			$files = glob(PATHUPLOAD.'/*.*');
			$ckname = ""; 
		}else{
			$files = glob(PATHUPLOAD.'/'.$fname."/*.*");
		}
		
		
		
		$ret = array();
		$i = 0;
		foreach($files as $file){ 
		  if(is_file($file))
		    $imgname = explode("/",$file);
			$ct = (count($imgname))-1;
			$ret[$i] = $ckname.$imgname[$ct];
			//echo $file."<br>";
			$i++;
			
		}
		
		return $ret;
	}
	public function folder_list(){
		
		$files = glob(PATHUPLOAD.'/*/');

		$ret = array();
		$i = 0;
		foreach($files as $file){ 

		 	$fdname = explode("/",$file);
		  	$ct = (count($fdname))-2;
			if($fdname[$ct]!=ENDPATH){
				$ret[$i] = $fdname[$ct];
				//echo $ret[$i]."<br>";
				$i++;	
			}
		}
		
		return $ret;
	}
	public function deleteIMG($iname){
			
		$path = PATHUPLOAD.'/'.$iname;
		$ret = unlink($path);
		echo $ret;

	}
	public function deleteFOLDER($fname){
		$files = glob(PATHUPLOAD.'/'.$fname."/*");
		foreach($files as $file){ 
		  if(is_file($file))
		    unlink($file); 
		}
		$ret = @rmdir(PATHUPLOAD.'/'.$fname);
		echo $ret;
	}
}
?>
<?php

class basefor {
	private $table_val = array();
	public function config($key,$vals){
		$this->table_val[$key] = $vals;
	}
	public function get($key){
		//print_r($this->table_val);
		return $this->table_val[$key];
	}
}
$base = new basefor();
require("../../../../../../config/init.php");
require('../../../ivp_cf.php'); 
require("upload.class.php");
$upload = new IVPUpload();
 if(!empty($_POST)){
 	
	if($_POST['cmd']=="createfolder"){
		$upload->createFD($_POST['fdname']);
	}
 	if($_POST['cmd']=="upload"){
		if($_POST['foldername']=="root"){
			$url = PATHUPLOAD."/".time()."_".$_FILES['upload']['name'];
		}else{
			$url = PATHUPLOAD.'/'.$_POST['foldername']."/".time()."_".$_FILES['upload']['name'];
		}
		 


		 //extensive suitability check before doing anything with the file...
		    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
		    {
		       $message = "No file uploaded.";
		    }
		    else if ($_FILES['upload']["size"] == 0)
		    {
		       $message = "The file is of zero length.";
		    }
		    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png") AND ($_FILES['upload']["type"] != "image/gif"))
		    {
		       $message = "The image must be in either GIF , JPG or PNG format. Please upload a JPG or PNG instead.";
		    }
		    
			else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
		    {
		       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
		    }
		    else {
		      $message = "1";
			
		      $move =  move_uploaded_file($_FILES['upload']['tmp_name'], $url);
		      if(!$move)
		      {
		         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
		      }
		      //$url = "../" . $url;
		    }

			if($message=="1"){
				echo '<script>window.top.csuccess();</script>';
			}else{
				echo '<script>alert("'.$message.PATHUPLOAD.'");</script>';
			}
	}
 }
 else{
 	if(!empty($_GET['maction'])){
		if($_GET['maction']=="delimg"){
			$upload->deleteIMG($_GET['iname']);
		}
		if($_GET['maction']=="delfd"){
			$upload->deleteFOLDER($_GET['fname']);
		}
	}
 }
 
?>
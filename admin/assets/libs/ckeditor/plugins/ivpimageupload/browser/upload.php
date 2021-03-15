<?php
 $url = '../../../upload/files/'.time()."_".$_FILES['upload']['name'];
 $urlr = 'upload/files/'.time()."_".$_FILES['upload']['name'];
	$path = 'http://localhost/888/';


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
      }else{
	  	$file_name = "../../../upload/files/cont.json";
		$data = file_get_contents($file_name);
		$json_data = json_decode($data);
		$ei = 0;
		$data = array();
		foreach($json_data as $datas){
			$data[$ei]['image'] = $datas->image;
			$ei++;
		}
		$cc = $ei+1;
		$data[$cc]['image'] = $path.$urlr;
		$json_data = json_encode($data);
		file_put_contents('../../../upload/files/cont.json', $json_data);
	  }
      //$url = "../" . $url;
    }

	
	

	if($message=="1"){
		echo '<script>window.top.csuccess();</script>';
	}else{
		echo '<script>alert("err");</script>';
	}
?>
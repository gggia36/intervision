<?php
/**
 * class : Thumbnail
 * USAGE:
 * $picname = $_FILES['upload']['name'];
		$dest_picname_o = 'upload/original/'.$picname;
		$dest_picname_m = 'upload/thumb_m/'.$picname;
		$dest_picname_s = 'upload/thumb_120_100/'.$picname;
		$dest_picname_sq = 'upload/thumb_sq_50/'.$picname;
		
		$tmp_file = $_FILES['upload']['tmp_name'];
		if(copy($tmp_file, $dest_picname_o)){
			$thumb = new Thumbnail($dest_picname_o);
			if($thumb->resize($dest_picname_m, 150, 150)){
				if($thumb->crop($dest_picname_s, 120, 100)){
					if($thumb->crop($dest_picname_sq, 50, 50)){
						header("Location: .");	 exit();
					}
				}
			}
		}
 */
class ThumbnailRC{
	private $_source;
	private $_source_width;
	private $_source_height;
	private $_source_mime;
	private $_max_width;
	private $_max_height;
	private $_thumb_width;
	private $_thumb_height;
	private $_dest;
	private $_allowed_types;
	private $_img_loaders;
	private $_img_creators;

		
	public function __construct($file){
		$this->_source = $file;
		$this->_allowed_types = array('image/jpeg','image/png','image/gif');
		
		$dims = getimagesize($this->_source);
		if(in_array($dims['mime'], $this->_allowed_types)){
			
			$this->_source_width = $dims[0];
			$this->_source_height = $dims[1];
			$this->_source_mime = $dims['mime'];
		}
		
		
		$this->_img_loaders = array(
			'image/jpeg' => 'imagecreatefromjpeg',
			'image/png' => 'imagecreatefrompng',
			'image/gif' => 'imagecreatefromgif'
		);
		$this->_img_creators = array(
			'image/jpeg' => 'imagejpeg',
			'image/png' => 'imagepng',
			'image/gif' => 'imagegif'
		);	
		//echo $this->_source_mime; exit();
	}
	
	
	/*+Public methods+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	/**
	 * Crop image
	 * params : $dest, $max_width,$max_height
	 * return Boolean
	 */
	public function crop($dest, $max_width, $max_height){
		$this->_max_width = $max_width;
		$this->_max_height = $max_height;
		$this->_thumb_width = $this->_max_width;
		$this->_thumb_height = $this->_max_height;
		$this->_dest = $dest;
		
		return $this->_crop();
	}
	
	/**
	 * Resize image
	 * params : $dest, $max_width [,$max_height = {NULL|EMPTY|'auto'}]
	 * return Boolean
	 */
	public function resize($dest, $max_width, $max_height){
		$this->_max_width = $max_width;
		$this->_max_height = $max_height;
		$this->_thumb_width = $this->_max_width;
		$this->_thumb_height = $this->_max_height;
		if($this->_max_height != NULL && $this->_max_height != '' && $this->_max_height != 'auto'){
			$scalemode = 'both';
		}else{
			$scalemode = NULL;	
		}
		$this->_dest = $dest;
		
		return $this->_resize($scalemode);
	}
	
	/*+Private methods+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
	/*Crop image*/
	private function _crop(){
		
		$this->_resize('both');
	
				
		$dest_x = ($this->_max_width- $this->_thumb_width)/2;
		$dest_y = ($this->_max_height - $this->_thumb_height)/2;
		$temp = imagecreatetruecolor($this->_max_width, $this->_max_height);

		if($this->_source_mime == 'image/png'){
				imagealphablending($temp, false);
				$bg=imagecolorallocatealpha($temp,255,255,255,127);
				imagefilledrectangle($temp,0,0,$this->_max_width, $this->_max_height,$bg);
				imagealphablending($temp,true);
				imagesavealpha($temp,true);
				
				$image_p = $this->_loader($this->_dest);
				$dims = getimagesize($this->_dest);
				$dest_width = $dims[0];
				$dest_height = $dims[1];
				
				
				imagecopyresampled( $temp, $image_p, $dest_x, $dest_y, 0, 0, $this->_thumb_width, $this->_thumb_height, $dest_width, $dest_height);	
				imagealphablending($temp,true);


		 }else{
			 
				$bg = imagecolorallocate( $temp, 255, 255, 255 );
				imagefill($temp, 0, 0, $bg); 
				
				$image_p = $this->_loader($this->_dest);
				imagecopy($temp, $image_p, $dest_x, $dest_y, 0, 0, $this->_thumb_width, $this->_thumb_height);
		 }

		return $this->_creator($temp, $this->_dest);
	}
	
	/*Resize image*/
	private function _resize($scalemode = NULL){
		
		$ratio_orig = $this->_source_width/$this->_source_height;
		
		
		
		$this->_thumb_height = floor($this->_max_width/$ratio_orig); 
		
		if($scalemode=='both'){   
			//4x3 dim
			if($this->_thumb_height < $this->_max_width){ 
				if($this->_source_width < $this->_max_width){
					$this->_thumb_height  = $this->_max_height; 
					$this->_thumb_width = ($this->_thumb_height * $ratio_orig);
				}
			}else{ 
				$this->_thumb_height  = $this->_max_height; 
				$this->_thumb_width = floor($this->_thumb_height* $ratio_orig); 
				
			}
		}
		
			/*Set dimension to original if image smaller than needed*/
			if($this->_source_width<=$this->_thumb_width){
				if($this->_source_height<=$this->_thumb_height){
					$this->_thumb_width = $this->_source_width;
					$this->_thumb_height = $this->_source_height;
				}
			}else{
				if($this->_source_width<=$this->_thumb_width){ 
					$this->_thumb_width = $this->_source_width;
					$this->_thumb_height = $this->_source_height;
				}
			}
		
		
		
		$temp = imagecreatetruecolor($this->_thumb_width, $this->_thumb_height);
		
		 if($this->_source_mime == 'image/png'){
			  imagealphablending($temp, false);
			  imagesavealpha($temp,true);
			  $transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
			  imagefilledrectangle($temp, 0, 0, $nWidth, $nHeight, $transparent);

		 }
		 $image_p = $this->_loader($this->_source);
		imagecopyresampled($temp, $image_p, 0, 0, 0, 0, $this->_thumb_width, $this->_thumb_height, $this->_source_width, $this->_source_height);
		
		return $this->_creator($temp, $this->_dest);
	}
	
	/*Create image loader*/
	private function _loader($str_source_file){
		$func_loader = $this->_img_loaders[$this->_source_mime];
		
		return $func_loader($str_source_file);
	}
	
	/*Create image creator*/
	private function _creator($resource, $dest){
		$func_creator = $this->_img_creators[$this->_source_mime];
		if($this->_source_mime == 'image/jpeg'){
			return $func_creator($resource, $dest, 100);
		}else{
			return $func_creator($resource, $dest);
		}
	}
}
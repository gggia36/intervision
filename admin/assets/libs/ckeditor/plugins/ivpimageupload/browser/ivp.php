<?php
session_start();
if(!empty($_GET['CKEditorFuncNum'])){
	$_SESSION['fcnum'] = $_GET['CKEditorFuncNum'];
}

$base = new basefor();
require("../../../../../../config/init.php");
//print_r(parse_ini_file("../../../../../../config.ini"));
//$cf = parse_ini_file("../../../../../../config.ini");
//echo $_SERVER['DOCUMENT_ROOT'];


require('../../../ivp_cf.php'); 
require("upload.class.php");
$upload = new IVPUpload();
$fdlist = $upload->folder_list();
$fds = "root";
if(!empty($_GET['folder'])){
	$fds = $_GET['folder'];
}
$imglist = $upload->imgList($fds);
//print_r($imglist);
/*foreach($imglist as $imgsx){ 
	echo $imgsx."<br>";
}*/

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
?>

<html>
	<head>
		<title>IVP Image Upload</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base>
		<link rel="stylesheet" href="ui/css/smoothness/jquery-ui-1.10.3.custom.min.css">
  		<script src="ui/js/jquery-1.9.1.js"></script>
  		<script src="ui/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="ivp.js"></script>
		<link rel="stylesheet" href="ui/demos.css">
		 
	</head>
			
	<body>
	<div id="main">
		<div id="vefloat" style="position: absolute;">
			<div id="folder_op">
				<p style="text-align: center;">IDOO IMAGEUPLOAD</p>
				<p style="text-align: center;"> <button type="button" onclick="createfd();">create folder</button> </p>
				<ul style="font-size: 12px;">
				<a style="text-decoration: none;" href="?folder=root"><img src="images/folder.png"/> ./root </a>
				<?php foreach($fdlist as $list){ ?>
					<li ><a style="text-decoration: none;" href="?folder=<?=$list?>"><img src="images/folder.png"/> <?=$list?> </a></li>
				<?php } ?>
				</ul>
			</div>
			<div id="bd-img">
					<div id="blog-h">
						<a href="javascript:;" onclick="uploadIMG();"><img src="images/upload.png"/></a>&nbsp;&nbsp;<img src="images/folder.png"/> ./<?=$fds?>
					</div>
					<?php if($fds!="root") {?>
					<div id="blog-h" style="text-align: right;margin-top: 5px;">
						<a href="javascript:;" onclick="deleteFOLDER('<?=$fds?>');"><img src="images/folder_delete.png"/></a>
					</div>
					<?php } ?>
					<div id="blog-img" style="margin-top: 20px;">
					<?php foreach($imglist as $imgs){ ?>
						<img style="width:150px;height: auto; cursor: pointer;" src="<?=IMAGEURL?><?=$imgs?>" onclick="addImgtoCK('<?=IMAGEURL?><?=$imgs?>','<?=$_SESSION['fcnum']?>');"/>
						<a href="javascript:;" onclick="deleteIMG('<?=$imgs?>');"><img src="images/delete.png"/></a>
					<?php } ?>
					</div>
			</div>
		</div>
	</div>
			<div id="dialog" title="Create Folder" style="display:none;">
			  <form enctype="multipart/form-data" method="POST" id="frmCFD">
			  <label for="fdname">Folder Name : </label>
			  	<input type="text" name="fdname"/>
				<input type="hidden" name="cmd" value="createfolder"/>
				<button type="button" onclick="createFDS();">create</button>
			  </form>
			</div>
			<div id="dialog-up" title="IVP Image Upload" style="display:none;">
			  <form enctype="multipart/form-data" method="POST" id="frmUP" action="action.php" target="upload_target" style="margin-top:30px;text-align: center;">
			  	<input type="file" name="upload"/>
				<input type="hidden" name="cmd" value="upload"/>
				<input type="hidden" name="foldername" value="<?=$fds?>"/>
				<button type="button" onclick="uploadNOW();">upload</button>
				<img id="set-load" style="display: none;"  src="159.GIF"/>
			  </form>
			</div>
			<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"> </iframe>
	</body>
</html>
<!--<?php
$files = glob(BASEDIR.'upload/files/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    echo $file;
	echo "<br>";
}
?>-->
<?php
	class SContent {


		public function createCategory(){
			$resultReturn = $this->_createCategory();
			return $resultReturn;
		}
		public function createList(){
			$resultReturn = $this->_categoryList();
			return $resultReturn;
		}
		public function categoryListAll(){
			$resultReturn = $this->_categoryListAll();
			return $resultReturn;
		}
		public function updateStatusCategory(){
			$resultReturn = $this->_updateStatusCategory();
			return $resultReturn;
		}
		public function updateSortCategory(){
			$resultReturn = $this->_updateSortCategory();
			return $resultReturn;
		}
		public function categoryInfomation(){
			$resultReturn = $this->_categoryInfomation();
			return $resultReturn;
		}
		public function updateCategory(){
			$resultReturn = $this->_updateCategory();
			return $resultReturn;
		}


		public function createContent(){
			$resultReturn = $this->_createContent();
			return $resultReturn;
		}
		public function contentList(){
			$resultReturn = $this->_contentList();
			return $resultReturn;
		}
		public function updateSortContent(){
			$resultReturn = $this->_updateSortContent();
			return $resultReturn;
		}
		public function updateStatusContent(){
			$resultReturn = $this->_updateStatusContent();
			return $resultReturn;
		}
		public function contentInfomation(){
			$resultReturn = $this->_contentInfomation();
			//GF::print_r($resultReturn);
			return $resultReturn;
		}

		public function updateContent(){
			$resultReturn = $this->_updateContent();
			return $resultReturn;
		}


		/**
		* Category
		*
		* @return
		*/
		private function _createCategory(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$sql = "INSERT INTO project_content_category (
													  status,
													  create_dtm,
													  create_by,
													  update_dtm,
													  update_by
													)VALUES(
														'O',
														NOW(),
														".GF::quote($user_id).",
														NOW(),
														".GF::quote($user_id)."
													)";

			$res = $db->Execute($sql);
 			$category_id = $db->Insert_ID();

 			$langlist = GF::langlist();

 			$random_number = GF::randomNumb(20);

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];

 				$picname = $_FILES['category_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['category_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['category_thumb_'.$lang_prefix]['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/content/category/";

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



				$sql = "UPDATE project_content_category SET
													  category_thumb_".$lang_prefix."=".GF::quote($file_name).",
													  category_name_".$lang_prefix."=".GF::quote($base->get('POST.category_name_'.$lang_prefix)).",
													  category_desc_".$lang_prefix."=".GF::quote($base->get('POST.category_desc_'.$lang_prefix)).",
													  meta_title_".$lang_prefix."=".GF::quote($base->get('POST.meta_title_'.$lang_prefix)).",
													  meta_desc_".$lang_prefix."=".GF::quote($base->get('POST.meta_desc_'.$lang_prefix)).",
													  meta_keyword_".$lang_prefix."=".GF::quote($base->get('POST.meta_keyword_'.$lang_prefix))."
													  WHERE category_id=".GF::quote($category_id);
				////echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;


		}

		private function _updateCategory(){

			//GF::print_r($base->get('POST'));
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$category_id = $base->get('POST.category_id');

 			$langlist = GF::langlist();

 			$random_number = GF::randomNumb(20);

 			foreach($langlist as $vals){
 				$lang_prefix = $vals['lang_prefix'];

 				$picname = $_FILES['category_thumb_'.$lang_prefix]['name'];

 				$file_name = $random_number."_".$lang_prefix;
 				if(!empty($picname)){
					$Str_file = explode(".",$_FILES['category_thumb_'.$lang_prefix]['name']);
					$file_type = end($Str_file);
					$tatal_name = count($Str_file);
					unset($Str_file[$tatal_name-1]);



					$tmp_file = $_FILES['category_thumb_'.$lang_prefix]['tmp_name'];

					$path_dir = $base->get('BASEDIR_F')."/uploads/content/category/";

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



				$sql = "UPDATE project_content_category SET
													  category_thumb_".$lang_prefix."=".GF::quote($file_name).",
													  category_name_".$lang_prefix."=".GF::quote($base->get('POST.category_name_'.$lang_prefix)).",
													  category_desc_".$lang_prefix."=".GF::quote($base->get('POST.category_desc_'.$lang_prefix)).",
													  meta_title_".$lang_prefix."=".GF::quote($base->get('POST.meta_title_'.$lang_prefix)).",
													  meta_desc_".$lang_prefix."=".GF::quote($base->get('POST.meta_desc_'.$lang_prefix)).",
													  meta_keyword_".$lang_prefix."=".GF::quote($base->get('POST.meta_keyword_'.$lang_prefix)).",
													  update_dtm=NOW(),
													  update_by=".GF::quote($user_id)."
													  WHERE category_id=".GF::quote($category_id);
				//echo $sql;
				$res = $db->Execute($sql);
			}

 			return true;


		}

		private function _categoryList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['content_category']['category_name']!=''){
				$cond_select .= ' AND category_name_'.GF::langdefault()." LIKE '%".$_SESSION['content_category']['category_name']."%'";
			}
			if($_SESSION['content_category']['status']!=''){
				$cond_select .= ' AND status='.GF::quote($_SESSION['content_category']['status']);
			}

			$sql = "SELECT * FROM project_content_category WHERE status!='D' ".$cond_select." ORDER BY sort ASC,create_dtm DESC";

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
				$arrReturn[$i]['category_id'] = $res->fields['category_id'];
				$arrReturn[$i]['category_name'] = $res->fields['category_name_'.GF::langdefault()];
				$arrReturn[$i]['category_desc'] = $res->fields['category_desc_'.GF::langdefault()];
				$arrReturn[$i]['category_thumb'] = $res->fields['category_thumb_'.GF::langdefault()];
				$arrReturn[$i]['sort'] = $res->fields['sort'];
				$arrReturn[$i]['status'] = $res->fields['status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}

		private function _categoryListAll(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];




			$sql = "SELECT * FROM project_content_category WHERE status='O' ORDER BY sort ASC,create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);

			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['category_id'] = $res->fields['category_id'];
				$arrReturn[$i]['category_name'] = $res->fields['category_name_'.GF::langdefault()];
				$arrReturn[$i]['category_desc'] = $res->fields['category_desc_'.GF::langdefault()];
				$arrReturn[$i]['category_thumb'] = $res->fields['category_thumb_'.GF::langdefault()];
				$arrReturn[$i]['sort'] = $res->fields['sort'];
				$arrReturn[$i]['status'] = $res->fields['status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}

		private function _categoryInfomation(){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$category_id = $base->get('_ids');
	 		//echo $exp_id;
	 		//echo $token;
	 		if($category_id!=''){
				$sql = "SELECT * FROM project_content_category WHERE category_id=".GF::quote($category_id);


				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				return $res->fields;
			}else{
				return NULL;
			}

		}


	 	private function _updateStatusCategory(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_content_category SET
	 												status=".GF::quote($base->get('GET.status')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE category_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}

	 	private function _updateSortCategory(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_content_category SET
	 												sort=".GF::quote($base->get('GET.sort')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE category_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}




	 	/**
		 * Content
		 *
		 * @return
		 */



	 	private function _createContent(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$content_name 	= $base->get('POST.content_name');
 			$content_link 	= $base->get('POST.content_link');
 			$content_desc 	= $base->get('POST.content_desc');
			$meta_title 	= $base->get('POST.meta_title');
			$meta_desc 		= $base->get('POST.meta_desc');
			$meta_keyword 	= $base->get('POST.meta_keyword');


 			$sql = "INSERT INTO project_content (
 													  content_name,
													  content_desc,
													  status,
													  content_link,
													  meta_title,
													  meta_desc,
													  meta_keyword,
													  create_dtm,
													  create_by,
													  update_dtm,
													  update_by
													)VALUES(
														".GF::quote($content_name).",
														".GF::quote($content_desc).",
														'O',
														".GF::quote($content_link).",
														".GF::quote($meta_title).",
														".GF::quote($meta_desc).",
														".GF::quote($meta_keyword).",
														NOW(),
														".GF::quote($user_id).",
														NOW(),
														".GF::quote($user_id)."
													)";

			$res = $db->Execute($sql);
 			$content_id = $db->Insert_ID();

 			$random_number = GF::randomNumb(20);

			$picname = $_FILES['content_thumb']['name'];

			$file_name = $random_number;

			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['content_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['content_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."/Images/content/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
						$sqlS = "UPDATE project_content SET
							  content_thumb"."=".GF::quote($file_name)."
							 WHERE content_id=".GF::quote($content_id);
						////echo $sql;
						$resS = $db->Execute($sqlS);
					}
				}else{
					$file_name = '';
				}
			}else{
				$file_name = '';
			}
				
			
			return true;

		}

		private function _updateContent(){


			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();
 			//GF::print_r($base->get('POST'));

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$content_id = $base->get('POST.content_id');
 			$content_name 	= $base->get('POST.content_name');
 			$content_link 	= $base->get('POST.content_link');
 			$content_desc 	= $base->get('POST.content_desc');
			$meta_title 	= $base->get('POST.meta_title');
			$meta_desc 		= $base->get('POST.meta_desc');
			$meta_keyword 	= $base->get('POST.meta_keyword');
 		
 			$random_number = GF::randomNumb(20);

 			$sql = "UPDATE project_content SET
 										  content_name=".GF::quote($content_name).",
 										  content_desc=".GF::quote($content_desc).",
 										  meta_title=".GF::quote($meta_title).",
 										  meta_desc=".GF::quote($meta_desc).",
 										  meta_keyword=".GF::quote($meta_keyword).",
										  content_link=".GF::quote($content_link)."

										  WHERE content_id=".GF::quote($content_id);
			$res = $db->Execute($sql);

			$picname = $_FILES['content_thumb']['name'];
			$file_name = $random_number;

			if(!empty($picname)){

				$Str_file = explode(".",$_FILES['content_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);
				$tmp_file = $_FILES['content_thumb']['tmp_name'];
				$path_dir = $base->get('BASEDIR_F')."/Images/content/";
				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}
					$sqlS = "UPDATE project_content SET
						  content_thumb"."=".GF::quote($file_name)."
						 WHERE content_id=".GF::quote($content_id);
				
					$resS = $db->Execute($sqlS);
					unlink($path_dir.$base->get('POST.old_thumb'));
					unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_thumb')));
				}else{
					$file_name = $base->get('POST.old_thumb');
				}
			}else{
				$file_name = $base->get('POST.old_thumb');
			}


			
 			return true;


		}

		private function _contentList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['content_content']['content_name']!=''){
				$cond_select .= " AND content_name LIKE '%".$_SESSION['content_content']['content_name']."%'";
			}
			if($_SESSION['content_content']['status']!=''){
				$cond_select .= ' AND status='.GF::quote($_SESSION['content_content']['status']);
			}

			$cond_in = '';


			$sql = "SELECT * FROM project_content WHERE status!='D' ".$cond_select.$cond_in." ORDER BY sort ASC,create_dtm DESC";

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
				$arrReturn[$i]['content_id'] = $res->fields['content_id'];
				$arrReturn[$i]['content_name'] = $res->fields['content_name'];
				$arrReturn[$i]['content_desc'] = $res->fields['content_desc'];
				$arrReturn[$i]['content_thumb'] = $res->fields['content_thumb'];
				$arrReturn[$i]['sort'] = $res->fields['sort'];
				$arrReturn[$i]['status'] = $res->fields['status'];
			
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			//GF::print_r($arrReturn);
			return 	$arrReturn;


		}
		private function _updateSortContent(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_content SET
	 												sort=".GF::quote($base->get('GET.sort')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE content_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}
		private function _updateStatusContent(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_content SET
	 												status=".GF::quote($base->get('GET.status')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE content_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}

	 	private function _contentInfomation(){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$content_id = $base->get('_ids');
	 		//echo $content_id;
	 		//echo $token;
	 		if($content_id!=''){
				$sql = "SELECT * FROM project_content WHERE content_id=".GF::quote($content_id);


				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				return $res->fields;
			}else{
				return NULL;
			}

		}

		private function _categoryInfomation_footer(){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

			$sql = "SELECT * FROM project_content WHERE content_id='6' ";


			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);

			return $res->fields;
		

		}



	}
?>

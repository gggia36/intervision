<?php
	class SArticle {


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



		public function createwriter(){
			$resultReturn = $this->_createwriter();
			return $resultReturn;
		}
		public function writerList(){
			$resultReturn = $this->_writerList();
			return $resultReturn;
		}
		public function writerListAll(){
			$resultReturn = $this->_writerListAll();
			return $resultReturn;
		}
		public function updateStatuswriter(){
			$resultReturn = $this->_updateStatuswriter();
			return $resultReturn;
		}
		public function updateSortwriter(){
			$resultReturn = $this->_updateSortwriter();
			return $resultReturn;
		}
		public function writerInfomation(){
			$resultReturn = $this->_writerInfomation();
			return $resultReturn;
		}
		public function updatewriter(){
			$resultReturn = $this->_updatewriter();
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
 			$category_name = $base->get('POST.category_name');
 			$category_color = $base->get('POST.category_color');
 			$meta_title = $base->get('POST.meta_title');
 			$meta_desc = $base->get('POST.meta_desc');
 			$meta_keyword = $base->get('POST.meta_keyword');
 			$og_title = $base->get('POST.og_title');
 			$og_desc = $base->get('POST.og_desc');
 			$active_status = $base->get('POST.active_status');
 			$sort = $base->get('POST.sort');

 			if(empty($meta_title)){
 				$meta_title = $category_name;
 			}

 			if(empty($meta_desc)){
 				$meta_desc = $category_name;
 			}

 			if(empty($meta_keyword)){
 				$meta_keyword = $category_name;
 			}

 			if(empty($og_title)){
 				$og_title = $category_name;
 			}

 			if(empty($og_desc)){
 				$og_desc = $category_name;
 			}

 			$sql = "INSERT INTO project_article_category (
 													  category_name,
 													  category_color,
 													  meta_title,
													  meta_desc,
													  meta_keyword,
													  og_title,
													  og_desc,
 													  sort,
													  status,
													  create_dtm,
													  create_by,
													  update_dtm,
													  update_by
													)VALUES(
														".GF::quote($category_name).",
														".GF::quote($category_color).",
														".GF::quote($meta_title).",
														".GF::quote($meta_desc).",
														".GF::quote($meta_keyword).",
														".GF::quote($og_title).",
														".GF::quote($og_desc).",
														".GF::quote($sort).",
														'$active_status',
														NOW(),
														".GF::quote($user_id).",
														NOW(),
														".GF::quote($user_id)."
													)";

			$res = $db->Execute($sql);
 			$category_id = $db->Insert_ID();

 			return $category_id;


		}

		private function _updateCategory(){

			//GF::print_r($base->get('POST'));
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$category_id = $base->get('POST.category_id');
 			$category_name = $base->get('POST.category_name');
 			$category_color = $base->get('POST.category_color');
 			$meta_title = $base->get('POST.meta_title');
 			$meta_desc = $base->get('POST.meta_desc');
 			$meta_keyword = $base->get('POST.meta_keyword');
 			$og_title = $base->get('POST.og_title');
 			$og_desc = $base->get('POST.og_desc');
 			$active_status = $base->get('POST.active_status');
 			$sort = $base->get('POST.sort');

 			if(empty($meta_title)){
 				$meta_title = $category_name;
 			}

 			if(empty($meta_desc)){
 				$meta_desc = $category_name;
 			}

 			if(empty($meta_keyword)){
 				$meta_keyword = $category_name;
 			}

 			if(empty($og_title)){
 				$og_title = $category_name;
 			}

 			if(empty($og_desc)){
 				$og_desc = $category_name;
 			}

 			$sql = "UPDATE project_article_category SET
													  category_name=".GF::quote($category_name).",
													  category_color=".GF::quote($category_color).",
													  meta_title=".GF::quote($meta_title).",
													  meta_desc=".GF::quote($meta_desc).",
													  meta_keyword=".GF::quote($meta_keyword).",
													  og_title=".GF::quote($og_title).",
													  og_desc=".GF::quote($og_desc).",
													  sort=".GF::quote($sort).",
													  status=".GF::quote($active_status).",
													  update_dtm=NOW(),
													  update_by=".GF::quote($user_id)."
													  WHERE category_id=".GF::quote($category_id);

			$res = $db->Execute($sql);

 			return true;


		}

		private function _categoryList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['article_category']['category_name']!=''){
				$cond_select .= " AND category_name LIKE '%".$_SESSION['article_category']['category_name']."%'";
			}
			if($_SESSION['article_category']['status']!=''){
				$cond_select .= ' AND status='.GF::quote($_SESSION['article_category']['status']);
			}

			$sql = "SELECT * FROM project_article_category WHERE status!='D' ".$cond_select." ORDER BY sort ASC,create_dtm DESC";

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
				$arrReturn[$i]['category_name'] = $res->fields['category_name'];
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




			$sql = "SELECT * FROM project_article_category WHERE status='O' ORDER BY sort ASC,create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);

			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['category_id'] = $res->fields['category_id'];
				$arrReturn[$i]['category_name'] = $res->fields['category_name'];
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
				$sql = "SELECT * FROM project_article_category WHERE category_id=".GF::quote($category_id);


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

	 		$sql = "UPDATE project_article_category SET
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

	 		$sql = "UPDATE project_article_category SET
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




	 	private function _createwriter(){
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];
 			$writer_name = $base->get('POST.writer_name');
 			$writer_position = $base->get('POST.writer_position');
 			$active_status = $base->get('POST.active_status');

 			$sql = "INSERT INTO project_article_writer (
 													  writer_name,
 													  writer_position,
													  status,
													  create_dtm,
													  create_by,
													  update_dtm,
													  update_by
													)VALUES(
														".GF::quote($writer_name).",
														".GF::quote($writer_position).",
														'$active_status',
														NOW(),
														".GF::quote($user_id).",
														NOW(),
														".GF::quote($user_id)."
													)";

			$res = $db->Execute($sql);
 			$writer_id = $db->Insert_ID();


 			$picname = $_FILES['writer_thumb']['name'];

 			$random_number = GF::randomNumb(20);

			$file_name = $random_number;

			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['writer_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['writer_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/writer/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;

						$sql = "UPDATE project_article_writer SET
												writer_thumb=".GF::quote($file_name)."
											WHERE writer_id=".GF::quote($writer_id);
		
						$res = $db->Execute($sql);
					}
				}else{
					$file_name = '';
				}
			}else{
				$file_name = '';
			}



			$picname_company = $_FILES['company_thumb']['name'];

			$random_number = GF::randomNumb(20);

			$filecompany_name = $random_number;
			
			if(!empty($picname_company)){
				$Str_file = explode(".",$_FILES['company_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['company_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/company/";

				$dest_picname_o = $path_dir.$filecompany_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$filecompany_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$filecompany_name = $filecompany_name."_thumb.".$file_type;

						$sql = "UPDATE project_article_writer SET
												company_thumb=".GF::quote($filecompany_name)."
											WHERE writer_id=".GF::quote($writer_id);
		
						$res = $db->Execute($sql);
					}
				}else{
					$file_name = '';
				}
			}else{
				$file_name = '';
			}


			

 			return $writer_id;


		}

		private function _updatewriter(){

			//GF::print_r($base->get('POST'));
			$base = Base::getInstance();
 			$db = DB::getInstance()->condb();
 			$member = new Member();

 			$memberInfomation = $member->memberInfomation();
 			$user_id = $memberInfomation['id'];

 			$writer_id = $base->get('POST.writer_id');
 			$writer_name = $base->get('POST.writer_name');
 			$writer_position = $base->get('POST.writer_position');
 			$active_status = $base->get('POST.active_status');

 			$sql = "UPDATE project_article_writer SET
													  writer_name=".GF::quote($writer_name).",
													  writer_position=".GF::quote($writer_position).",
													  status=".GF::quote($active_status).",
													  update_dtm=NOW(),
													  update_by=".GF::quote($user_id)."
													  WHERE writer_id=".GF::quote($writer_id);

			$res = $db->Execute($sql);

			$random_number = GF::randomNumb(20);

			$picname = $_FILES['writer_thumb']['name'];

			$file_name = $random_number."";

			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['writer_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['writer_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/writer/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}

					$sql = "UPDATE project_article_writer SET
												  writer_thumb=".GF::quote($file_name)."

												  WHERE writer_id=".GF::quote($writer_id);
		
					$res = $db->Execute($sql);

					unlink($path_dir.$base->get('POST.old_thumb'));
					unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_thumb')));
				}else{
					$file_name = $base->get('POST.old_thumb');
				}
			}else{
				$file_name = $base->get('POST.old_thumb');
			}


			$random_number = GF::randomNumb(20);

			$picname = $_FILES['company_thumb']['name'];

			$file_name = $random_number."";

			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['company_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['company_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/company/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}

					$sql = "UPDATE project_article_writer SET

												  company_thumb=".GF::quote($file_name)."

												  WHERE writer_id=".GF::quote($writer_id);
		
					$res = $db->Execute($sql);

					unlink($path_dir.$base->get('POST.old_company_thumb'));
					unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_company_thumb')));
				}else{
					$file_name = $base->get('POST.old_company_thumb');
				}
			}else{
				$file_name = $base->get('POST.old_company_thumb');
			}

 			return true;


		}

		private function _writerList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['article_writer']['writer_name']!=''){
				$cond_select .= " AND writer_name LIKE '%".$_SESSION['article_writer']['writer_name']."%'";
			}
			if($_SESSION['article_writer']['status']!=''){
				$cond_select .= ' AND status='.GF::quote($_SESSION['article_writer']['status']);
			}

			$sql = "SELECT * FROM project_article_writer WHERE status!='D' ".$cond_select." ORDER BY create_dtm DESC";

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
				$arrReturn[$i]['writer_id'] = $res->fields['writer_id'];
				$arrReturn[$i]['writer_thumb'] = $res->fields['writer_thumb'];
				$arrReturn[$i]['company_thumb'] = $res->fields['company_thumb'];
				$arrReturn[$i]['writer_name'] = $res->fields['writer_name'];
				$arrReturn[$i]['writer_position'] = $res->fields['writer_position'];
				$arrReturn[$i]['status'] = $res->fields['status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}

		private function _writerListAll(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];


			$sql = "SELECT * FROM project_article_writer WHERE status='O' ORDER BY create_dtm DESC";

			////echo $sql;
			$res = $db->Execute($sql);

			$arrReturn = array();
			$i = 0;
			while(!$res->EOF){
				$arrReturn[$i]['writer_id'] = $res->fields['writer_id'];
				$arrReturn[$i]['writer_name'] = $res->fields['writer_name'];
				$arrReturn[$i]['sort'] = $res->fields['sort'];
				$arrReturn[$i]['status'] = $res->fields['status'];
				$arrReturn[$i]['update_dtm'] = $res->fields['update_dtm'];
				$i++;
				$res->MoveNext();
			}
			$res->Close();
			return 	$arrReturn;


		}

		private function _writerInfomation(){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$writer_id = $base->get('_ids');
	 		//echo $exp_id;
	 		//echo $token;
	 		if($writer_id!=''){
				$sql = "SELECT * FROM project_article_writer WHERE writer_id=".GF::quote($writer_id);


				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				return $res->fields;
			}else{
				return NULL;
			}

		}


	 	private function _updateStatuswriter(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_article_writer SET
	 												status=".GF::quote($base->get('GET.status')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE writer_id=".GF::quote($base->get('GET.id'));
	 		////echo $sql;
	 		$res = $db->Execute($sql);
	 		if($res){
				echo('T');
			}
	 	}

	 	private function _updateSortwriter(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_article_writer SET
	 												sort=".GF::quote($base->get('GET.sort')).",
	 												update_dtm=NOW(),
	 												update_by=".GF::quote($user_id)."
	 												WHERE writer_id=".GF::quote($base->get('GET.id'));
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

 			$data_content_date = $base->get('POST.content_date');

 			if(!empty($data_content_date)){
 				$data_content_date = str_replace('/', '-', $data_content_date);

 				$content_date = date('Y-m-d',strtotime($data_content_date));

 				$content_date = GF::quote($content_date);

 			}else{
 				$content_date = 'NULL';
 			}

 			$data_cate_id = $base->get('POST.category_id');

 			$active_status = $base->get('POST.active_status');

 			if(!empty($data_cate_id)){
 				$category_id = implode(',', $data_cate_id);
 			}

 			$content_url = $base->get('POST.content_url');

 			if(empty($content_url)){
 				$content_url = $base->get('POST.content_name');
 			}

 			$meta_title = $base->get('POST.meta_title');
 			$meta_desc = $base->get('POST.meta_desc');
 			$meta_keyword = $base->get('POST.meta_keyword');
 			$og_title = $base->get('POST.og_title');
 			$og_desc = $base->get('POST.og_desc');

 			if(empty($meta_title)){
 				$meta_title = $base->get('POST.content_name');
 			}

 			if(empty($meta_desc)){
 				$meta_desc = $base->get('POST.content_name');
 			}

 			if(empty($meta_keyword)){
 				$meta_keyword = $base->get('POST.content_name');
 			}

 			if(empty($og_title)){
 				$og_title = $base->get('POST.content_name');
 			}

 			if(empty($og_desc)){
 				$og_desc = $base->get('POST.content_name');
 			}

 			$sql = "INSERT INTO project_article (
 													  category_id,
													  writer_id,
													  lang_mode,
 													  content_name,
 													  content_url,
													  content_desc,
													  content_short,
													  content_date,
													  status,
													  active_status,
													  sort,
													  meta_title,
													  meta_desc,
													  meta_keyword,
													  og_title,
													  og_desc,
													  create_dtm,
													  create_by,
													  update_dtm,
													  update_by
													)VALUES(
														".GF::quote($category_id).",
														".GF::quote($base->get('POST.writer_id')).",
														".GF::quote($base->get('POST.lang_mode')).",
														".GF::quote($base->get('POST.content_name')).",
														".GF::quote($content_url).",
														".GF::quote($base->get('POST.content_desc')).",
														".GF::quote($base->get('POST.content_short')).",
														$content_date,
														'O',
														'$active_status',
														".GF::quote($base->get('POST.sort')).",
														".GF::quote($meta_title).",
														".GF::quote($meta_desc).",
														".GF::quote($meta_keyword).",
														".GF::quote($og_title).",
														".GF::quote($og_desc).",
														NOW(),
														".GF::quote($user_id).",
														NOW(),
														".GF::quote($user_id)."
													)";

			$res = $db->Execute($sql);
 			$content_id = $db->Insert_ID();

 			$random_number = GF::randomNumb(20);

			$picname = $_FILES['content_thumb_highlight']['name'];

			$file_name = $random_number;
			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['content_thumb_highlight']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['content_thumb_highlight']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/highlight/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}

					$sql = "UPDATE project_article SET
												content_thumb_highlight=".GF::quote($file_name)."
											WHERE content_id=".GF::quote($content_id);
		
					$res = $db->Execute($sql);
				}else{
					$file_name = '';
				}
			}else{
				$file_name = '';
			}

 			$random_number = GF::randomNumb(20);

			$picname = $_FILES['content_thumb']['name'];

			$file_name = $random_number;
			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['content_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['content_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."Images/article/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}

					$sql = "UPDATE project_article SET
												content_thumb=".GF::quote($file_name)."
											WHERE content_id=".GF::quote($content_id);
		
					$res = $db->Execute($sql);
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

 			$random_number = GF::randomNumb(20);

			$picname = $_FILES['content_thumb_highlight']['name'];

			$file_name = $random_number."";
			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['content_thumb_highlight']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);

				$tmp_file = $_FILES['content_thumb_highlight']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."/Images/article/highlight/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}

					$sql = "UPDATE project_article SET
												content_thumb_highlight=".GF::quote($file_name)."
											WHERE content_id=".GF::quote($content_id);
		
					$res = $db->Execute($sql);
					
					unlink($path_dir.$base->get('POST.old_thumb_highlight'));
					unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_thumb_highlight')));
				}else{
					$file_name = $base->get('POST.old_thumb_highlight');
				}
			}else{
				$file_name = $base->get('POST.old_thumb_highlight');
			}



 			$random_number = GF::randomNumb(20);

			$picname = $_FILES['content_thumb']['name'];

			$file_name = $random_number."";
			if(!empty($picname)){
				$Str_file = explode(".",$_FILES['content_thumb']['name']);
				$file_type = end($Str_file);
				$tatal_name = count($Str_file);
				unset($Str_file[$tatal_name-1]);



				$tmp_file = $_FILES['content_thumb']['tmp_name'];

				$path_dir = $base->get('BASEDIR_F')."/Images/article/";

				$dest_picname_o = $path_dir.$file_name."_full.".$file_type;
				$dest_picname_t = $path_dir.$file_name."_thumb.".$file_type;

				if(copy($tmp_file, $dest_picname_o)){
					$thumb = new ThumbnailRC($dest_picname_o);
					if($thumb->resize($dest_picname_t, 150, 150)){
						$file_name = $file_name."_thumb.".$file_type;
					}
					unlink($path_dir.$base->get('POST.old_thumb'));
					unlink($path_dir.str_replace("_thumb","_full",$base->get('POST.old_thumb')));
				}else{
					$file_name = $base->get('POST.old_thumb');
				}
			}else{
				$file_name = $base->get('POST.old_thumb');
			}

			$data_content_date = $base->get('POST.content_date');

 			if(!empty($data_content_date)){
 				$data_content_date = str_replace('/', '-', $data_content_date);

 				$content_date = date('Y-m-d',strtotime($data_content_date));

 				$content_date = GF::quote($content_date);

 			}else{
 				$content_date = 'NULL';
 			}

 			$data_cate_id = $base->get('POST.category_id');

			if(!empty($data_cate_id)){
 				$category_id = implode(',', $data_cate_id);
 			}

 			$content_url = $base->get('POST.content_url');

 			if(empty($content_url)){
 				$content_url = $base->get('POST.content_name');
 			}

 			$meta_title = $base->get('POST.meta_title');
 			$meta_desc = $base->get('POST.meta_desc');
 			$meta_keyword = $base->get('POST.meta_keyword');
 			$og_title = $base->get('POST.og_title');
 			$og_desc = $base->get('POST.og_desc');

 			if(empty($meta_title)){
 				$meta_title = $base->get('POST.content_name');
 			}

 			if(empty($meta_desc)){
 				$meta_desc = $base->get('POST.content_name');
 			}

 			if(empty($meta_keyword)){
 				$meta_keyword = $base->get('POST.content_name');
 			}

 			if(empty($og_title)){
 				$og_title = $base->get('POST.content_name');
 			}

 			if(empty($og_desc)){
 				$og_desc = $base->get('POST.content_name');
 			}


			$sql = "UPDATE project_article SET
												  category_id=".GF::quote($category_id).",
												  writer_id=".GF::quote($base->get('POST.writer_id')).",
												  lang_mode=".GF::quote($base->get('POST.lang_mode')).",
												  content_thumb=".GF::quote($file_name).",
												  content_name=".GF::quote($base->get('POST.content_name')).",
												  content_url=".GF::quote($content_url).",
												  content_desc=".GF::quote($base->get('POST.content_desc')).",
                                     			  content_short=".GF::quote($base->get('POST.content_short')).",
                                     			  content_date=$content_date,
                                     			  active_status=".GF::quote($base->get('POST.active_status')).",
                                     			  sort=".GF::quote($base->get('POST.sort')).",
                                     			  meta_title=".GF::quote($meta_title).",
                                     			  meta_desc=".GF::quote($meta_desc).",
                                     			  meta_keyword=".GF::quote($meta_keyword).",
                                     			  og_title=".GF::quote($og_title).",
                                     			  og_desc=".GF::quote($og_desc).",
												  update_dtm=NOW(),
												  update_by=".GF::quote($user_id)."
												  WHERE content_id=".GF::quote($content_id);
		
			$res = $db->Execute($sql);
			



 			return true;


		}

		private function _contentList(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();


	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];



	 		$cond_select = '';
	 		if($_SESSION['article_content']['content_name']!=''){
				$cond_select .= " AND content_name LIKE '%".$_SESSION['article_content']['content_name']."%'";
			}

			if($_SESSION['article_content']['category_id']!=''){
				// CONCAT(pub_name,' ',country_office)="Ultra Press Inc. London"; 
				$data_cate = ','.$_SESSION['article_content']['category_id'].',';
				$cond_select .= " AND CONCAT(',',category_id,',') LIKE '%".$data_cate."%'";
			}

			if($_SESSION['article_content']['writer_id']!=''){
				$cond_select .= ' AND writer_id='.GF::quote($_SESSION['article_content']['writer_id']);
			}

			if($_SESSION['article_content']['status']!=''){
				$cond_select .= ' AND status='.GF::quote($_SESSION['article_content']['status']);
			}


			$cond_in = '';


			$sql = "SELECT * FROM project_article WHERE status!='D' ".$cond_select.$cond_in." ORDER BY sort ASC,create_dtm DESC";

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
				$arrReturn[$i]['category_list'] = $this->_categoryInfo($res->fields['category_id']);
				$arrReturn[$i]['writer_name'] = $this->_writerName($res->fields['writer_id']);
				$arrReturn[$i]['content_name'] = $res->fields['content_name'];
				$arrReturn[$i]['content_short'] = $res->fields['content_short'];
				$arrReturn[$i]['content_desc'] = $res->fields['content_desc'];
				$arrReturn[$i]['content_thumb'] = $res->fields['content_thumb'];
				$arrReturn[$i]['content_view'] = $res->fields['content_view'];
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

		private function _categoryInfo($data_id){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$arrReturn = array();

	 		if($data_id!=''){
				$sql = "SELECT category_name FROM project_article_category WHERE category_id IN ($data_id)";
				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				$i = 0;
				while(!$res->EOF){
					$arrReturn[$i] = $res->fields['category_name'];

					$i++;
					$res->MoveNext();
				}
				$res->Close();

				return $arrReturn;
			}else{
				return NULL;
			}

		}

		private function _writerName($id){
	 		$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		if($id!=''){
				$sql = "SELECT writer_name FROM project_article_writer WHERE writer_id=".GF::quote($id);
				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				return $res->fields['writer_name'];
			}else{
				return NULL;
			}

		}

		private function _updateSortContent(){
			$base = Base::getInstance();
	 		$db = DB::getInstance()->condb();

	 		$member = new Member();


	 		$memberInfomation = $member->memberInfomation();

	 		$user_id = $memberInfomation['id'];

	 		$sql = "UPDATE project_article SET
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

	 		$sql = "UPDATE project_article SET
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
				$sql = "SELECT * FROM project_article WHERE content_id=".GF::quote($content_id);


				$db->SetFetchMode(ADODB_FETCH_ASSOC);
				$res = $db->Execute($sql);

				$res->fields['category_id'] = explode(',', $res->fields['category_id']);

				$res->fields['content_date'] = date('d/m/Y',strtotime($res->fields['content_date']));

				return $res->fields;
			}else{
				return NULL;
			}

		}


	}
?>

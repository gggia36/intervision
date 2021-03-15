<?php
class SBlog{

	public function news_categoryAll(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$sql = "SELECT category_id,category_name,category_color FROM project_article_category WHERE status='O' ORDER BY sort ASC";
		$res = $db->Execute($sql);

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['category_id'] 		= $res->fields['category_id'];
			$RowsList[$i]['category_name'] 		= $res->fields['category_name'];
			$RowsList[$i]['category_color'] 	= $res->fields['category_color'];
			$RowsList[$i]['content_list'] 		= $this->getContentBy_category($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}

		$res->Close();

		return  $RowsList;

	}

	public function getContentBy_category($cate_id){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,writer_id,content_name,content_url,content_short,content_thumb,content_date FROM project_article WHERE status='O' AND active_status='O' AND category_id=$cate_id AND lang_mode='$langview' ORDER BY create_dtm DESC LIMIT 4";
		$res = $db->Execute($sql);

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;

	}

	public function news_latest(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,writer_id,content_name,content_url,content_short,content_thumb,content_date FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='$langview' ORDER BY create_dtm DESC LIMIT 4";
		$res = $db->Execute($sql);

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;

	}

	public function news_list(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,content_name,content_url,content_short,content_thumb_highlight FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='$langview' ORDER BY create_dtm DESC LIMIT 3";
		$res = $db->Execute($sql);

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb_highlight']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;

	}

	public function news_list_all(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,writer_id,content_date,content_name,content_url,content_short,content_thumb FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='$langview' ORDER BY create_dtm DESC ";
		$res = $db->Execute($sql);

		$count = 0;

			while(!$res->EOF){
				$count++;
				$res->MoveNext();
			}

		$res->Close();

		$base->set('allPage',ceil($count/12));

		$page = $base->get('GET.pages');

		$numr = 12;
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

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}

		$res->Close();

		 return  $RowsList;

	}

	public function news_list_category(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$category_id = $base->get('_ids');

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,writer_id,content_date,content_name,content_url,content_short,content_thumb FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='$langview' AND category_id=$category_id ORDER BY sort DESC ";
		$res = $db->Execute($sql);

		$count = 0;

			while(!$res->EOF){
				$count++;
				$res->MoveNext();
			}

		$res->Close();

		$base->set('allPage',ceil($count/12));

		$page = $base->get('GET.pages');

		$numr = 12;
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

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}

		$res->Close();
		// GF::print_r($RowsList);

		 return  $RowsList;

	}

	public function cate_info(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$category_id = $base->get('_ids');

		$sql = "SELECT * FROM project_article_category WHERE status='O' AND category_id=$category_id LIMIT 1 ";
		
		$res = $db->Execute($sql);

		$RowsList = array();
	
		$RowsList['category_id'] 		= $res->fields['category_id'];
		$RowsList['category_name'] 		= $res->fields['category_name'];
		$RowsList['meta_title'] 		= $res->fields['meta_title'];
		$RowsList['meta_desc'] 			= $res->fields['meta_desc'];
		$RowsList['meta_keyword'] 		= $res->fields['meta_keyword'];
		$RowsList['og_title'] 			= $res->fields['og_title'];
		$RowsList['og_desc'] 			= $res->fields['og_desc'];

		 return  $RowsList;

	}

	public function news_list_all_search(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

	
		$langview = $_SESSION['language'];


		$key_data = $base->get('POST.search_blog');

		$sql = "SELECT content_id,category_id,writer_id,content_date,content_name,content_url,content_short,content_thumb FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='$langview' AND (content_name LIKE '%$key_data%' OR content_short LIKE '%$key_data%' OR content_desc LIKE '%$key_data%') ORDER BY create_dtm DESC ";
		$res = $db->Execute($sql);

		$count = 0;

			while(!$res->EOF){
				$count++;
				$res->MoveNext();
			}

		$res->Close();

		$base->set('allPage',ceil($count/12));

		$page = $base->get('GET.pages');

		$numr = 12;
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

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}

		$res->Close();

		 return  $RowsList;

	}

	public function news_detail(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$blog_id = $base->get('_ids');

		$sql = "SELECT content_id,writer_id,category_id,content_name,content_short,content_desc,content_thumb,content_date,meta_title,meta_keyword,meta_desc,og_title,og_desc FROM project_article WHERE status='O' AND active_status='O' AND content_id=$blog_id ";
		$res = $db->Execute($sql);

		$RowsList = array();

		$RowsList['content_id'] 		= $res->fields['content_id'];
		$RowsList['content_name'] 		= $res->fields['content_name'];
		$RowsList['content_short'] 		= $res->fields['content_short'];
		$RowsList['content_desc'] 		= $res->fields['content_desc'];
		$content_date_1					= date('F d',strtotime($res->fields['content_date']));
		$content_date_2					= '<span>'.date('S',strtotime($res->fields['content_date'])).'</span>';
		$content_date_3					= date(' Y',strtotime($res->fields['content_date']));
		$RowsList['content_date'] 		= $content_date_1.$content_date_2.$content_date_3;
		$RowsList['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
		$RowsList['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
		$RowsList['category_info'] 		= $this->category_info($res->fields['category_id']);
		$RowsList['meta_title'] 		= $res->fields['meta_title'];
		$RowsList['meta_keyword'] 		= $res->fields['meta_keyword'];
		$RowsList['meta_desc'] 			= $res->fields['meta_desc'];
		$RowsList['og_title'] 			= $res->fields['og_title'];
		$RowsList['og_desc'] 			= $res->fields['og_desc'];

		return  $RowsList;

	}

	public function news_related(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$blog_id = $base->get('_ids');

		$langview = $_SESSION['language'];

		$sql = "SELECT content_id,category_id,writer_id,content_date,content_name,content_url,content_short,content_thumb FROM project_article WHERE status='O' AND active_status='O' AND content_id != $blog_id  AND lang_mode='$langview' ORDER BY create_dtm DESC LIMIT 4";
		$res = $db->Execute($sql);

		$RowsList = array();
		$i = 0;
		while(!$res->EOF){ 
			$RowsList[$i]['content_id'] 		= $res->fields['content_id'];
			$RowsList[$i]['content_name'] 		= $res->fields['content_name'];
			$RowsList[$i]['content_url'] 		= $res->fields['content_url'];
			$RowsList[$i]['content_short'] 		= $res->fields['content_short'];
			$RowsList[$i]['content_img'] 		= str_replace('thumb', 'full', $res->fields['content_thumb']);
			$RowsList[$i]['content_date'] 		= date('M d Y',strtotime($res->fields['content_date']));
			$RowsList[$i]['writer_info'] 		= $this->writer_info($res->fields['writer_id']);
			$RowsList[$i]['category_info'] 		= $this->category_info($res->fields['category_id']);
			$i++;
			$res->MoveNext();
		}
		 return  $RowsList;

	}

	public function writer_info($id){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$RowsList = array();

		if(!empty($id)){
			$sql = "SELECT * FROM project_article_writer WHERE status='O' AND writer_id = $id ";
			$res = $db->Execute($sql);

			$RowsList['writer_id'] 			= $res->fields['writer_id'];
			$RowsList['writer_name'] 		= $res->fields['writer_name'];
			$RowsList['writer_position'] 	= $res->fields['writer_position'];
			$RowsList['writer_thumb'] 		= $res->fields['writer_thumb'];
			$RowsList['company_thumb'] 		= $res->fields['company_thumb'];

		}

		return  $RowsList;

	}

	public function category_info($data_id){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$RowsList = array();

		if(!empty($data_id)){
			$sql = "SELECT category_id,category_name,category_color FROM project_article_category WHERE status='O' AND category_id IN ($data_id) ";
			$res = $db->Execute($sql);

			$i = 0;
			while(!$res->EOF){ 
				$RowsList[$i]['category_id'] 		= $res->fields['category_id'];
				$RowsList[$i]['category_name'] 		= $res->fields['category_name'];
				$RowsList[$i]['category_color'] 		= $res->fields['category_color'];

				$i++;
				$res->MoveNext();
			}

			$res->Close();

		}

		return  $RowsList;

	}
}

?>
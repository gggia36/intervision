<?php
class SHome{

	public function news_list(){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		$sql = "SELECT content_id,category_id,content_name,content_url,content_short,content_thumb_highlight FROM project_article WHERE status='O' AND active_status='O' AND lang_mode='en' ORDER BY create_dtm DESC LIMIT 3";
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

	public function category_info($data_id){
		$base = Base::getInstance();
		$db = DB::getInstance()->condb();

		if(!empty($data_id)){
			$data_cat_id = explode(',', $data_id);

			$cat_id = $data_cat_id[0];
		}

		$sql = "SELECT category_name,category_color FROM project_article_category WHERE status='O' AND category_id=$cat_id ORDER BY create_dtm DESC LIMIT 1";
		$res = $db->Execute($sql);

		$RowsList = array();

		$RowsList['category_name'] 		= $res->fields['category_name'];
		$RowsList['category_color'] 	= $res->fields['category_color'];

		return  $RowsList;

	}
}

?>
<?php
 class Content extends Permission{

 	public function beforeroute($base){
 		$this->module_ids = '2';
		$this->set_permission('category','1');
		$this->set_permission('contentlist','3');
		
		
		$this->set_edit('createcategory','1');
		$this->set_edit('editcategory','1');
		
		$this->set_edit('createcontent','3');
		
		$this->set_delete('contentlist','3');

		$this->PermissionAuth();
		$base->set('langmode','content');
	}
	
	/**
	* 
	* @param Category Section
	* 
	* @return
	*/
 	public function category($base){
		$content = new SContent();
		
		$categoryList = $content->createList();
 		
 		$base->set('categoryList',$categoryList);
		Template::getInstance()->render('content/category.htm');
	}
	public function createcategory($base){

		Template::getInstance()->render('content/createcategory.htm');
	}
	public function editcategory($base){
		$content = new SContent();

		$cateInfo = $content->categoryInfomation();

		$base->set('cateInfo',$cateInfo);

		Template::getInstance()->render('content/createcategory.htm');
	}
	public function updatecategory($base){
		$content = new SContent();
		$content->updateStatusCategory();
	}
	public function updatesortcategory($base){
		$content = new SContent();
		$content->updateSortCategory();
	}
	
	/**
	* 
	* @param Content Section
	* 
	* @return
	*/
	public function contentlist($base){
		$content = new SContent();
		
		$contentList = $content->contentList();
 		// $categoryList = $content->categoryListAll();
 		
 		// $base->set('categoryList',$categoryList);
 		$base->set('contentList',$contentList);
		Template::getInstance()->render('content/contentlist.htm');
	}
	public function createcontent($base){
		$content = new SContent();
		
		//$categoryList = $content->categoryListAll();
 		
 		//$base->set('categoryList',$categoryList);
		Template::getInstance()->render('content/createcontent.htm');
	}
	public function editcont($base){
		$content = new SContent();

		$contentInfo = $content->contentInfomation();
		//$categoryList = $content->categoryListAll();

 		$base->set('contentInfo',$contentInfo);
 		//$base->set('categoryList',$categoryList);

		Template::getInstance()->render('content/createcontent.htm');
	}
	public function updatecont($base){
		$content = new SContent();
		$content->updateStatusContent();
	}
	public function updatesortct($base){
		$content = new SContent();
		$content->updateSortContent();
	}
	
	/**
	* 
	* @param Form Section
	* 
	* @return
	*/
	
	public function processFrm($base){
		$content = new SContent();
		//GF::print_r($base->get('POST'));
		$mode = $base->get('POST.mode');
		if($mode=='createcategory'){
			$result = $content->createCategory();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='editcategory'){
			
			$result = $content->updateCategory();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='searchcategory'){

				$category_name = $base->get('POST.category_name');
				$status = $base->get('POST.status');
				

				$_SESSION['content_category']['category_name'] = $category_name;
				$_SESSION['content_category']['status'] = $status;


			echo '<script>window.top.successContetnCallBack();</script>';
		}
		else if($mode=='clearcategory'){
			unset($_SESSION['content_category']);
			echo '<script>window.top.successContetnCallBack();</script>';
		}
		
		/**
		* 
		* @var Content
		* 
		*/
		
		else if($mode=='createcontent'){
			$result = $content->createContent();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='editcontent'){
			
			$result = $content->updateContent();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		
		
		
		else if($mode=='clearcontent'){
			unset($_SESSION['content_content']);
			echo '<script>window.top.successContetnCallBack();</script>';
		}
		else if($mode=='searchcontent'){

				$content_name = $base->get('POST.content_name');
				$status = $base->get('POST.status');
				$category_id = $base->get('POST.category_id');

				$_SESSION['content_content']['content_name'] = $content_name;
				$_SESSION['content_content']['status'] = $status;
				$_SESSION['content_content']['category_id'] = $category_id;


			echo '<script>window.top.successContetnCallBack();</script>';
		}
		
	}

 }
?>
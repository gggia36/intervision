<?php
 class Article extends Permission{

 	public function beforeroute($base){
 		$this->module_ids = '16';
		$this->set_permission('category','26');
		$this->set_permission('newslist','23');


		$this->set_edit('createcategory','26');
		$this->set_edit('editcategory','26');

		$this->set_edit('createarticles','23');

		$this->set_delete('newslist','23');

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
		$article = new SArticle();

		$categoryList = $article->createList();

 		$base->set('categoryList',$categoryList);
		Template::getInstance()->render('article/category.htm');
	}
	public function createcategory($base){
	
		Template::getInstance()->render('article/createcategory.htm');
	}
	public function editcategory($base){
		$article = new SArticle();

		$cateInfo = $article->categoryInfomation();

		$base->set('cateInfo',$cateInfo);

		Template::getInstance()->render('article/createcategory.htm');
	}
	public function updatecategory($base){
		$article = new SArticle();
		$article->updateStatusCategory();
	}
	public function updatesortcategory($base){
		$article = new SArticle();
		$article->updateSortCategory();
	}



	public function writer($base){
		$article = new SArticle();

		$writerList = $article->writerList();

 		$base->set('writerList',$writerList);
		Template::getInstance()->render('article/writer.htm');
	}
	public function createwriter($base){
	
		Template::getInstance()->render('article/createwriter.htm');
	}
	public function editwriter($base){
		$article = new SArticle();

		$writerInfo = $article->writerInfomation();

		$base->set('writerInfo',$writerInfo);

		Template::getInstance()->render('article/createwriter.htm');
	}
	public function updatewriter($base){
		$article = new SArticle();
		$article->updateStatuswriter();
	}
	public function updatesortwriter($base){
		$article = new SArticle();
		$article->updateSortWriter();
	}

	/**
	*
	* @param Content Section
	*
	* @return
	*/
	public function newslist($base){
		$article = new SArticle();

		$newslist = $article->contentList();
		$categoryList = $article->categoryListAll();
 		$writerList = $article->writerListAll();
 	
 		$base->set('categoryList',$categoryList);
 		$base->set('writerList',$writerList);
 		$base->set('contentList',$newslist);
		Template::getInstance()->render('article/contentlist.htm');
	}
	public function create_news($base){
		$article = new SArticle();

		$categoryList = $article->categoryListAll();
 		$writerList = $article->writerListAll();

 		$base->set('categoryList',$categoryList);
 		$base->set('writerList',$writerList);

		Template::getInstance()->render('article/createcontent.htm');
	}
	public function edit_new($base){
		$article = new SArticle();

		$articleInfo = $article->contentInfomation();
		$categoryList = $article->categoryListAll();
		$writerList = $article->writerListAll();

		$base->set('writerList',$writerList);

 		$base->set('contentInfo',$articleInfo);
 		$base->set('categoryList',$categoryList);

		Template::getInstance()->render('article/createcontent.htm');
	}
	public function updatecont($base){
		$article = new SArticle();
		$article->updateStatusContent();
	}
	public function updatesortct($base){
		$article = new SArticle();
		$article->updateSortContent();
	}

	/**
	*
	* @param Form Section
	*
	* @return
	*/

	public function processFrm($base){
		$article = new SArticle();
		//GF::print_r($base->get('POST'));
		$mode = $base->get('POST.mode');
		if($mode=='createcategory'){
			$result = $article->createCategory();
			if($result>0){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='editcategory'){

			$result = $article->updateCategory();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='searchcategory'){

				$category_name = $base->get('POST.category_name');
				$status = $base->get('POST.status');


				$_SESSION['article_category']['category_name'] = $category_name;
				$_SESSION['article_category']['status'] = $status;


			echo '<script>window.top.successContetnCallBack();</script>';
		}
		else if($mode=='clearcategory'){
			unset($_SESSION['article_category']);
			echo '<script>window.top.successContetnCallBack();</script>';
		}


		else if($mode=='createwriter'){
			$result = $article->createwriter();
			if($result>0){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='editwriter'){

			$result = $article->updatewriter();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='searchwriter'){

				$writer_name = $base->get('POST.writer_name');
				$status = $base->get('POST.status');


				$_SESSION['article_writer']['writer_name'] = $writer_name;
				$_SESSION['article_writer']['status'] = $status;


			echo '<script>window.top.successContetnCallBack();</script>';
		}
		else if($mode=='clearwriter'){
			unset($_SESSION['article_writer']);
			echo '<script>window.top.successContetnCallBack();</script>';
		}

		/**
		*
		* @var Content
		*
		*/

		else if($mode=='createcontent'){
			$result = $article->createContent();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='editcontent'){

			$result = $article->updateContent();
			if($result){
				echo '<script>window.top.successContetnCallBack();</script>';
			}else{
				echo "F";
			}
		}
		else if($mode=='clearcontent'){
			unset($_SESSION['article_content']);
			echo '<script>window.top.successContetnCallBack();</script>';
		}
		else if($mode=='searchcontent'){

				$article_name = $base->get('POST.content_name');
				$status = $base->get('POST.status');
				$category_id = $base->get('POST.category_id');
				$writer_id = $base->get('POST.writer_id');

				$_SESSION['article_content']['content_name'] = $article_name;
				$_SESSION['article_content']['status'] = $status;
				$_SESSION['article_content']['category_id'] = $category_id;
				$_SESSION['article_content']['writer_id'] = $writer_id;


			echo '<script>window.top.successContetnCallBack();</script>';
		}

	}

 }
?>

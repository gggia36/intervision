<?php
 class Blog {
 	
	public function news(){
 		$base = Base::getInstance();
 		$blog = new SBlog;

 		$categoryAll = $blog->news_categoryAll(); 
 		
 		$latestAll = $blog->news_latest(); 
		$base->set('TITLE','News & Articles :: Intervision.co');
		$base->set('DESC','News & Articles :: Intervision.co');
 		$base->set('categoryAll',$categoryAll);
 		$base->set('latestAll',$latestAll);
 		$base->set('active_blog','current-menu-item');
 		Template::getInstance()->pagecontent = 'blog/news.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function blogall(){
 		$base = Base::getInstance();
 		$blog = new SBlog;
 
 		$categoryAll = $blog->news_categoryAll(); 

 		$news_list_all = $blog->news_list_all(); 

 		

 		$base->set('categoryAll',$categoryAll);
 		$base->set('news_list_all',$news_list_all);
 		$base->set('active_blog','current-menu-item');
 		Template::getInstance()->pagecontent = 'blog/blog_all.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function blog_search(){
 		$base = Base::getInstance();
 		$blog = new SBlog;
 	
 		$categoryAll = $blog->news_categoryAll(); 

 		$news_list_all = $blog->news_list_all_search(); 

 		$key_data = $base->get('POST.search_blog'); 

 		$base->set('key_data',$key_data);
 		$base->set('categoryAll',$categoryAll);
 		$base->set('news_list_all',$news_list_all);
 		$base->set('active_blog','current-menu-item');

		Template::getInstance()->render('blog/blog_search.htm');
		echo 1;
	}

	public function blog_category(){
 		$base = Base::getInstance();
 		$blog = new SBlog;

 		$categoryAll = $blog->news_categoryAll(); 

 		$news_list_all = $blog->news_list_category(); 

 		$news_detail = $blog->cate_info(); 

 		$ids = $base->get('_ids');

 		$category_id = $base->get('_ids');

 		$url_set = $base->get('BASEURL').'/blog/category/'.$news_detail['category_id'].'/'.GF::formatURL($news_detail['category_name']);
 		
		$base->set('url_set',$url_set);

		// Meta 
		$base->set('TITLE',$news_detail['meta_title']);
		$base->set('DESC',$news_detail['meta_desc']);
		// END Meta


 		$base->set('ids',$ids);
 		$base->set('category_id',$category_id);
 		$base->set('categoryAll',$categoryAll);
 		$base->set('news_list_all',$news_list_all);
 		$base->set('news_detail',$news_detail);
 		$base->set('active_blog','current-menu-item');
 		Template::getInstance()->pagecontent = 'blog/blog_category.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function blog_detail(){
 		$base = Base::getInstance();
 		$blog = new SBlog;

 		$ids = $base->get('_ids');

 		$news_detail = $blog->news_detail(); 
 		
 		$news_related = $blog->news_related();  

 		$url_set = $base->get('BASEURL').'/blog/'.$news_detail['content_id'].'/'.GF::formatURL($news_detail['content_name']);

 		$base->set('TITLE',$news_detail['meta_title']);
 		$base->set('DESC',$news_detail['meta_desc']);

 		$base->set('ids',$ids);
 		$base->set('url_set',$url_set);
 		$base->set('news_detail',$news_detail);
 		$base->set('news_related',$news_related);
 		$base->set('active_blog','current-menu-item');
 		Template::getInstance()->pagecontent = 'blog/blog_detail.htm';
		Template::getInstance()->render('layout.htm');

	} 

	public function change_lang(){
 		$base = Base::getInstance();

		
		$_SESSION['langview'] = $base->get('POST.data_lang');
		
		echo 1;
 		

	}

	
 }


?>
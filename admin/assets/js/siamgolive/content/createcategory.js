function saveContentCategory(){
	alertMessage('Please confirm to Save Category.','saveContentCategoryCallback');
}

function saveContentCategoryCallback(){
	
	if($('#category_thumb_'+LANG_DEFAULT).val()=='' && $('#category_id').val()=='0'){
		noticeMessage('Please Choose Category Thumb','scriptFocus("#category_thumb_'+LANG_DEFAULT+'");');
		return;
	}
	
	if($('#category_name_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Category Name','scriptFocus("#category_name_'+LANG_DEFAULT+'");');
		return;
	}
	
	if($('#meta_title_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Meta Title','scriptFocus("#meta_title_'+LANG_DEFAULT+'");');
		return;
	}
	
	if($('#meta_keyword_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Meta Keyword','scriptFocus("#meta_keyword_'+LANG_DEFAULT+'");');
		return;
	}
	
	if($('#meta_desc_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Meta Description','scriptFocus("#meta_desc_'+LANG_DEFAULT+'");');
		return;
	}


	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/content/processFrm",
	f.submit();
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/content/category/?'+new Date().getTime();
}



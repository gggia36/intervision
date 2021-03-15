function saveContentCategory(){


	if($('#category_name').val()==''){
		noticeMessage('Please Enter Category Name','scriptFocus("#category_name");');
		return;
	}


	alertMessage('Please confirm to Save Category.','saveContentCategoryCallback');
}

function saveContentCategoryCallback(){

	
	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/news/category/?'+new Date().getTime();
}

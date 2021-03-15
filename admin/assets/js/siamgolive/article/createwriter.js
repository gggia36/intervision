function saveContentwriter(){


	if($('#writer_name').val()==''){
		noticeMessage('Please Enter writer Name','scriptFocus("#writer_name");');
		return;
	}


	alertMessage('Please confirm to Save writer.','saveContentwriterCallback');
}

function saveContentwriterCallback(){

	
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
	window.location.hash = '/news/writer/?'+new Date().getTime();
}

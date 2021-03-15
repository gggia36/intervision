function saveContent(){
	if($('#email').val()==''){
			noticeMessage('Please Enter E-Mail','scriptFocus("#email");');
		return;
	}
	if(!IsEmail($('#email').val())){            
			noticeMessage('Please Check format E-Mail','scriptFocus("#email");');
		return;
	}
	if($('#email_cc').val()!=''){
		if(!IsEmail($('#email_cc').val())){            
			noticeMessage('Please Check format E-Mail','scriptFocus("#email_cc");');
			return;
		} 
	}
	if($('#email_bcc').val()!=''){
		if(!IsEmail($('#email_bcc').val())){            
			noticeMessage('Please Check format E-Mail','scriptFocus("#email_bcc");');
			return;
		}
	}
	if($('#tel').val()==''){
			noticeMessage('Please Enter Tel.','scriptFocus("#tel");');
		return;
	}
	alertMessage('Please confirm to Save Content.','saveContentContentCallback');
}

function saveContentContentCallback(){

	

	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/setting/contactform/?'+new Date().getTime();
}
function saveFaqList(){
	if($('#faq_name_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter FAQ Title','scriptFocus("#faq_name_'+LANG_DEFAULT+'");');
		return;
	}
	alertMessage('Please confirm to Save FAQ.','saveFaqCallback');
}

function saveFaqCallback(){
	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm/",
	f.submit();
}
function successFaqlistCallBack(){
	preload('hide');
	window.location.hash = '/setting/faqlist/?'+new Date().getTime();
}
function setFaqListStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('setting/updatestatusFaq/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortFaqlist(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('setting/updatesortFaq/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/setting/faqlist/?'+new Date().getTime();
}
function searchFaqlist(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function clearFaqlist(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function deleteFaqlist(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete FAQ.','deleteFaqContent');
}
function deleteFaqContent(){
	if(dataiddel!=''){
		ajaxRequestProcess('setting/delFaqlist/?status=C&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}
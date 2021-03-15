function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/news/writer/?'+new Date().getTime();
}


function setContentwriterStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('news/updatewriter/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortContentwriter(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('news/updatesortwriter/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}

function searchContentwriter(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
function clearContentwriter(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
var dataiddel = '';
function deleteCatgory(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete writer.','deleteContentwriter');
}
function deleteContentwriter(){;
	if(dataiddel!=''){
		ajaxRequestProcess('news/updatewriter/?status=D&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}

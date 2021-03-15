$(function () {


     $(".select2").select2();


});


function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/news/newslist/?'+new Date().getTime();
}


function setContentcontentStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('news/updatecont/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortContentContent(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('news/updatesortct/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}

function searchContentContent(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
function clearContentContent(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
var dataiddel = '';
function deleteContent(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete Content.','deleteContentContent');
}
function deleteContentContent(){
	if(dataiddel!=''){
		ajaxRequestProcess('news/updatecont/?status=D&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}

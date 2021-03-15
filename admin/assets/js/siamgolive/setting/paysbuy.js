function savePaysbuylist(){
	if($('#paysbuy_name_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Title','scriptFocus("#paysbuy_name_'+LANG_DEFAULT+'");');
		return;
	}
	if($('#bank_id_fix').val()==''){
		noticeMessage('Please Enter Paysbuy ID','scriptFocus("#paysbuy_id_fix");');
		return;
	}
	
	alertMessage('Please confirm to Save Paysbuy List.','savePaysbuylistCallback');
}

function savePaysbuylistCallback(){
	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm/",
	f.submit();
}
function successPaysbuylistCallBack(){
	preload('hide');
	window.location.hash = '/setting/paysbuylist/?'+new Date().getTime();
}
function setPaysbuyStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('setting/updatestatusPaysbuy/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortPaysbuy(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('setting/updatesortPaysbuy/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/setting/paysbuylist/?'+new Date().getTime();
}
function searchPaysbuyList(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function clearPaysbuyList(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function deletePaysbuylist(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete Paysbuy List.','deletePaysbuylistContent');
}
function deletePaysbuylistContent(){
	if(dataiddel!=''){
		ajaxRequestProcess('setting/delPaysbuy/?status=C&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}
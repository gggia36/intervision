function saveBanklist(){
	if($('#bank_thumb_'+LANG_DEFAULT).val()=='' && $('#bank_id').val()=='0'){
		noticeMessage('Please Choose Bank Thumb','scriptFocus("#bank_thumb_'+LANG_DEFAULT+'");');
		return;
	}
	
	if($('#bank_name_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Bank Name','scriptFocus("#bank_name_'+LANG_DEFAULT+'");');
		return;
	}
	if($('#bank_id_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Bank ID','scriptFocus("#bank_id_'+LANG_DEFAULT+'");');
		return;
	}
	
	alertMessage('Please confirm to Save Bank List.','saveBanklistCallback');
}

function saveBanklistCallback(){
	
	


	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm/",
	f.submit();
}
function successBanklistCallBack(){
	preload('hide');
	window.location.hash = '/setting/banklist/?'+new Date().getTime();
}
function setBankListStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('setting/updatestatusbanklist/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortBanklist(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('setting/updatesortbanklist/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/setting/banklist/?'+new Date().getTime();
}
function searchBankList(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function clearBankList(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function deleteBanklist(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete Bank List.','deleteBanklistContent');
}
function deleteBanklistContent(){
	if(dataiddel!=''){
		ajaxRequestProcess('setting/delbanklist/?status=D&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}
function iconDown(LANG_D){
	$('#icon-list-'+LANG_D).slideDown();
}
function iconUp(LANG_D){
	$('#icon-list-'+LANG_D).slideUp();
}
function selectIcon(text,LANG_D){
	$('#icon_'+LANG_D).val(text);
	$("#icon-display_"+LANG_D).removeAttr('class');
	$("#icon-display_"+LANG_D).attr('class', '');
	$('#icon-display_'+LANG_D)[0].className = '';
	$('#icon-display_'+LANG_D).addClass('fa fa-'+text);
	$('#icon-list').slideUp();
}
function saveSocialList(){
	
if($('#social_name_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Social Name','scriptFocus("#social_name_'+LANG_DEFAULT+'");');
		return;
	}
	if($('#icon_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Select Icon','scriptFocus("#icon_'+LANG_DEFAULT+'");');
		return;
	}
	if($('#social_link_'+LANG_DEFAULT).val()==''){
		noticeMessage('Please Enter Social Link','scriptFocus("#social_link_'+LANG_DEFAULT+'");');
		return;
	}
	alertMessage('Please confirm to Save Social.','saveSocialListCallback');
}

function saveSocialListCallback(){
	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm/",
	f.submit();
}
function successSocialListCallBack(){
	preload('hide');
	window.location.hash = '/setting/social/?'+new Date().getTime();
}
function setSocialStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('setting/updatestatusSocial/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/setting/social/?'+new Date().getTime();
}
function sortSociallist(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('setting/updatesortSocial/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}
function searchSocaillist(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function clearSocaillist(){
	preload('show');
	var f = document.getElementById('clearFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm",
	f.submit();
}
function deleteSocialList(datid){
	dataiddel = datid;
	alertMessage('Please confirm to Delete Social.','deleteSocialContent');
}
function deleteSocialContent(){
	if(dataiddel!=''){
		ajaxRequestProcess('setting/delSociallist/?status=C&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}
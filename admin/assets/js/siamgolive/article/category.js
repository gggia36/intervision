function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/news/category/?'+new Date().getTime();
}


function setContentcategoryStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('news/updatecategory/?status='+datastatus+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}

}
function sortContentCategory(elem){
	var dataid = $(elem).attr('data-id');
	var datassort = $(elem).val();
	if(dataid!=''){
		ajaxRequestProcess('news/updatesortcategory/?sort='+datassort+"&id="+dataid,successContetnCallBack);
	}else{
		return;
	}
}

function searchContentCategory(){
	preload('show');
	var f = document.getElementById('searchFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
function clearContentCategory(){
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
	alertMessage('Please confirm to Delete Category.','deleteContentCategory');
}
function deleteContentCategory(){;
	if(dataiddel!=''){
		ajaxRequestProcess('news/updatecategory/?status=D&id='+dataiddel,successContetnCallBack);
	}else{
		return;
	}
}

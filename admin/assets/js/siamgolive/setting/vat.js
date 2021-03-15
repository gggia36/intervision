function updateVat(){
	alertMessage('Please confirm to Update VAT.','updateVatCallback');
}
function updateVatCallback(){
	preload('show');
	$.ajax({
		   type: "POST",
		   data:{
		   	mode:"updatevat",
		   	vat_value : $('#vat_value').val()
		   },
		   url:  BASEURL+"/setting/processFrm/",
		   success: function(resp){
		   	preload('hide');
		   		window.location.hash = '/setting/vat/?'+new Date().getTime();
			}
		 });
}
function setVatStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('setting/updatestatusVat/?status='+datastatus+"&id="+dataid,successVatCallBack);
	}else{
		return;
	}

}
function successVatCallBack(){
	preload('hide');
	window.location.hash = '/setting/vat/?'+new Date().getTime();
}
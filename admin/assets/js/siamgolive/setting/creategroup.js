$(function () {
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
});

function saveGroup(){
	alertMessage('Please confirm to create Group.','saveGroupCallback');
}

function saveGroupCallback(){
	
	/*if($('#meeting_title').val()==''){
		noticeMessage('Please Enter Meeting Title');
		$('#meeting_title').focus();
		return;
	}*/
	

	preload('show');
	var f = document.getElementById('createFrm'); 

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/setting/processFrm", 
	f.submit();
}
function successCallBack(){
	preload('hide');
	window.location.hash = '/setting/permission/';
}
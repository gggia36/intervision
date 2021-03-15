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


function saveContentContent(){
	if($('#content_name').val()==''){
		noticeMessage('Please Enter Content Name','scriptFocus("#content_name");');
		return;
	}
	
	alertMessage('Please confirm to Save Content.','saveContentContentCallback');
}

function saveContentContentCallback(){
	
	


	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/content/processFrm";
	f.submit();
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/content/contentlist/?'+new Date().getTime();
}



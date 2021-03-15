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
	if($('#content_thumb').val()=='' && $('#content_id').val()=='0'){
		noticeMessage('กรุณาอัพโหลดรูปภาพ','scriptFocus("#content_thumb");');
		return;
	}

	if($('#content_name').val()==''){
		noticeMessage('กรุณากรอกชื่อข่าวสาร','scriptFocus("#content_name");');
		return;
	}

	if($('#category_id').val()==''){
		noticeMessage('กรุณาเลือกหมวดหมู่','scriptFocus("#category_id");');
		return;
	}

	if($('#writer_id').val()==''){
		noticeMessage('กรุณาเลือกผู้เขียน','scriptFocus("#writer_id");');
		return;
	}

	
	alertMessage('Please confirm to Save.','saveContentContentCallback');
}

function saveContentContentCallback(){

	preload('show');
	var f = document.getElementById('contFrm');

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/news/processFrm";
	f.submit();
}
function successContetnCallBack(){
	preload('hide');
	window.location.hash = '/news/newslist/?'+new Date().getTime();
}

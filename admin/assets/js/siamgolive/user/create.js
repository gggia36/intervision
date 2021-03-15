$(function () {
      //$("#birthdate").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
     // $("#startdate").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
      
      /*$('body').on('click', '#saveUser', function(){ 
			alertMessage('Please confirm to Create Employee.','saveUserCallback');
	  });*/
	   $(".my_date").datepicker({
	      	todayBtn: "linked",
	       language: "th",
	       autoclose: true,
	       todayHighlight: true,
	       format: 'dd-mm-yyyy' 
      });
      
});


function saveUser(){
	
	if($('#user_name').val()==''){
		noticeMessage('กรุณาใส่ข้อมูล ชื่อ-นามสกุล','scriptFocus("#user_name");');
		return;
	}
	if($('#user_phone_number').val()==''){
		noticeMessage('กรุณาใส่ข้อมูล เบอร์โทรศัพท์','scriptFocus("#user_phone_number");');
		return;
	}
	if($('#birthdate').val()==''){
		noticeMessage('กรุณาใส่ข้อมูล วันเกิด','scriptFocus("#birthdate");');
		return;
	}
	if($('#mode').val()=="create"){
		if($('#user_email').val()==''){
			noticeMessage('กรุณาใส่ข้อมูล อีเมล์','scriptFocus("#user_email");');
			return;
		}
		if(!IsEmail($('#user_email').val())){
			noticeMessage('กรุณาตรวจสอบ อีเมล์ อีกครั้ง','scriptFocus("#user_email");');
			return;
		}	
	}
	if($('#mode').val()=="create"){
		if($('#user_password').val()==''){
			noticeMessage('กรุณาใส่ข้อมูล รหัสผ่าน','scriptFocus("#user_password");');
			//$('#user_username').focus();
			return;
		} 
	} 
	if($('#mode').val()=="create"){
	$.ajax({ 
	   type: "GET", 
	   url:  BASEURL+"/utility/checkemail/?email="+$('#user_email').val(),
	   dataType:"JSON",
	   success: function(resp){
			if(resp.result=="P"){
				alertMessage('Please confirm to save employee.','saveUserCallback');
				
			}else{
				noticeMessage('ไม่สามารถใช้ อีเมล์นี้ได้','scriptFocus("#user_email");');
				return;
			}
	   }
	 });
	}else{
		alertMessage('Please confirm to edit employee.','saveUserCallback');
	}		
	
}

function saveUserCallback(){
	
	
	/*if($('#user_password').val()==''){
		noticeMessage('Please Enter Password');
		$('#user_password').focus();
		return;
	}*/
	
	preload('show');
	var f = document.getElementById('createFrm'); 

	f.method = 'post';
	f.enctype = 'multipart/form-data';
	f.target = 'updateFrm';
	f.action = BASEURL+"/user/processFrm", 
	f.submit();
}
function successCallBack(){
	preload('hide');
	location.hash = '/user/userlist/'
}

function checkUsername(myselector){
	var lengthtext = $(myselector).val().length;
	if(lengthtext<6){
		noticeMessage('Please Enter Username more than 6 charracters','scriptFocus("#user_username");');
		return;
	}
	ajaxRequestProcess('user/checkusername/?name='+$(myselector).val(),checkUsernameCallback);
}
function checkUsernameCallback(resp){
	preload('hide');
	if(resp=='F'){
		$('#save_emp_btn').hide();
		noticeMessage("Username Invalid, please try again.",'scriptFocus("#user_username");');
		return;
	}else{
		$('#save_emp_btn').show();
	}
}



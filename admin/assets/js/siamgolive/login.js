function preload(action){
	if(action=='hide'){
		$('#preloadModal').modal('hide');
	}else{
		$('#preloadModal').modal({ 
	      	keyboard: false ,
	      	backdrop:'static'
	      
	      }) ; 
	}
	
}
document.onkeydown=function(){
    if(window.event.keyCode=='13'){
        submitLogin();
    }
}

function submitLogin(){
	if($('#vc_username').val()==""){
		alert('Please complete "Username" fields.');
		$('#vc_username').focus();
		return;
	}
	if($('#vc_password').val()==""){
		alert('Please complete "Password" fields.');
		$('#vc_password').focus();
		return;
	}
	preload('show');
	var params = $('#loginFrm').serialize();
		
		
		$.ajax({ 
		   type: "POST", 
		   url:  BASEURL+"/auth/login/",
		   data: params, 
		   success: function(resp){
		   		
		   		if(resp=='A'){
		   			setTimeout(function(){
		   				preload('hide');
		   				window.location = BASEURL;
		   			},1500);
					
				}
				else if(resp=='P'){
					
					setTimeout(function(){
		   				preload('hide');
		   				alert('Please complete "Password" fields.');
						$('#vc_password').focus();
		   			},500);
				}
				else if(resp=='U'){
					
					setTimeout(function(){
		   				preload('hide');
		   				alert('Please complete "Username" fields.');
						$('#vc_username').focus();
		   			},500);
				}
				console.log(resp);
			}
		 });
}
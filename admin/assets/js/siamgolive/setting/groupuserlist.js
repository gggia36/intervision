$(function () {
		
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	          checkboxClass: 'icheckbox_minimal-blue',
	          radioClass: 'iradio_minimal-blue'
	        });
		
    	
        
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
      });
      

		
});


function saveUserGroup(){
	alertMessage('Please confirm to Save User Group.','saveUserGroupCallback');
}

function saveUserGroupCallback(){
	

	

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
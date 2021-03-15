var dataid = '0';

$(function () {
	
       /*$("#example1").DataTable();*/
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
      });
      
      
      $('.box-body').on('click', '.user-delete', function(){
			dataid = $(this).attr('data-id');
			alertMessage('Please confirm to Delete Employee.','daleteUserCallback');
			
		});
		
		
});
function daleteUserCallback(){
	if(dataid!='0'){
		ajaxRequestProcess('user/delete/'+dataid,deleteCallback);
	}else{
		return;
	}
	
}      
function deleteCallback(){
	/*preload('hide');
	window.location.hash = '#/user/userlist/';
	$('html, body').animate({ scrollTop: 0 }, 'fast');*/
	//location.reload();
	window.location.hash = '/user/userlist/?'+new Date().getTime();
}
function setMemberStatus(elem){
	var dataid = $(elem).attr('data-id');
	var datastatus = $(elem).attr('data-status');
	if(dataid!=''){
		ajaxRequestProcess('user/updateuserstatus/?status='+datastatus+"&id="+dataid,successSlideCallBack);
	}else{
		return;
	}
}
function successSlideCallBack(){
	preload('hide');
	window.location.hash = '/user/userlist/?'+new Date().getTime();
}

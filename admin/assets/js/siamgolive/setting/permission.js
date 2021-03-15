$(function () {
		
    	
        
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
      });
      

		
});

var dataids='0';
function deleteGroup(myojb){
	dataids = $(myojb).attr('data-id');
	alertMessage('Please confirm to delete group.','deleteGroupFunc');
}
function deleteGroupFunc(){
	if(dataids!='0'){
		ajaxRequestProcess('setting/deletegroup/'+dataids+'/',deleteGroupCallback);
	}else{
		return;
	}
}
function deleteGroupCallback(){
	//location.reload();
	
	window.location.hash = '/setting/permission/?'+new Date().getTime();
}
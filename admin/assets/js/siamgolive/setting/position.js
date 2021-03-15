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

function savePosition(){
	alertMessage('Please confirm to create position.','savePositionCallback');
}

function savePositionCallback(){
	
	

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
	window.location.hash = '/setting/position/';
}

var dataids='0';
function deletePosition(myojb){
	dataids = $(myojb).attr('data-id');
	alertMessage('Please confirm to delete position.','deletePositionFunc');
}
function deletePositionFunc(){
	if(dataids!='0'){
		ajaxRequestProcess('setting/deleteposition/'+dataids,deletePSCallback);
	}else{
		return;
	}
}
function deletePSCallback(){
	location.reload();
}
function createfd(){
	$( "#dialog" ).dialog({
      height: 100,
      width: 250,
      modal: true
	});
}
function uploadIMG(){
	$( "#dialog-up" ).dialog({
      height: 200,
      width: 350,
      modal: true
	});
}
function createFDS(){
	//alert("ddd");return;
	var params = $('#frmCFD').serialize();
	$.ajax({ 
	   type: "POST", 
	   url:  "action.php", 
	   data: params, 
	   success: function(resp){
		 //alert(resp); return;
		 if(resp=="1"){
		 	$("#dialog").dialog("close");
			location.reload();
		 }else{
		 	alert("can't create folder");
		 }
	   }
	 });
}
function addImgtoCK(adata,fcnum){
	window.opener.CKEDITOR.tools.callFunction(fcnum, adata);
	window.close();
}
function uploadNOW(){
	$('#set-load').attr('style','');
	$("#frmUP").submit();
}
function csuccess(){
	location.reload();
}
function deleteIMG(iname){
	var r=confirm("Do you want delete '"+iname+"'");
	if (r==true)
	  {
	  	$.ajax({ 
		   type: "POST", 
		   url:  "action.php?maction=delimg&iname="+iname,  
		   success: function(resp){
			 if(resp=="1"){
			 	location.reload();
			 }else{
			 	alert("Err to delete "+iname);
				return;
			 }
		   }
		 });
	  }
	else
	  {
	  	return;
	  }
}
function deleteFOLDER(iname){
	var r=confirm("Do you want delete '"+iname+"'");
	if (r==true)
	  {
	  	$.ajax({ 
		   type: "POST", 
		   url:  "action.php?maction=delfd&fname="+iname,  
		   success: function(resp){
		   	//alert(resp);
			 if(resp=="1"){
			 	window.location.assign("ivp.php");
			 }else{
			 	alert("Err to delete "+iname);
				return;
			 }
		   }
		 });
	  }
	else
	  {
	  	return;
	  }
}
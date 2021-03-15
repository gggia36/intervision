$(function(){
	
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
      
	 $(".my_date").datepicker({
		  	todayBtn: "linked",
		    language: "th",
		    autoclose: true,
		    todayHighlight: true,
		    format: 'dd-mm-yyyy'
		    
      });
      $(".my_datem").datepicker({
      		language: "th",
	        autoclose: true,
	      	format: "mm-yyyy",
		    viewMode: "months", 
		    minViewMode: "months"
		    
      });
      $(".my_datey").datepicker({
	      	language: "th",
	        autoclose: true,
	      	format: "yyyy",
		    viewMode: "years", 
		    minViewMode: "years"
      });
       $('input').on('ifChecked', function(event){
		 var _this = this;
		 if($(_this).val()=="D"){
		 	$('#selectDay').show();
		 	$('#selectMonth').hide();
		 	$('#selectYear').hide();
		 }else if($(_this).val()=="M"){
		 	$('#selectDay').hide();
		 	$('#selectMonth').show();
		 	$('#selectYear').hide();
		 	
		 }else if($(_this).val()=="Y"){
		 	$('#selectDay').hide();
		 	$('#selectMonth').hide();
		 	$('#selectYear').show();
		 }
		
		}); 
});
function selectReport(types){
	
	if(types=="A"){
		preload('show');
		var selectA = $('#selectA').val();
		var selectB = $('#selectB').val();
		$.ajax({
		   type: "POST",
		   url:  BASEURL+"/product/processFrm",
		   dataType:"JSON",
		   data:{
		   	mode:"countdate",
		   	start_date:selectA,
		   	end_date:selectB,
		   },
		   success: function(resp){
		   	preload('hide');
		   		if(resp.result=="pass"){
					$.ajax({
					   type: "GET",
					   url:  BASEURL+"/dashboard/",
					   data:{
					   	types:"D",
					   	start_date:selectA,
					   	end_date:selectB,
					   },
					   success: function(resp){
					   		window.location.hash = '/dashboard/?types=D&start_date='+selectA+'&end_date='+selectB+"&"+new Date().getTime();
						}
					 });
				}else{
					noticeMessage('Please Check date select !','scriptFocus("#selectA");');
					return;
				}
			}
		 });
	}else if(types=="M"){
		var selectA = $('#selectMA').val();
		var selectB = $('#selectMB').val();
		if(selectA==''){
			noticeMessage('Please select Month !','scriptFocus("#selectMA");');
			return;
		}
		if(selectB==''){
			noticeMessage('Please select Month !','scriptFocus("#selectMB");');
			return;
		}
		preload('show');
		$.ajax({
		   type: "POST",
		   url:  BASEURL+"/product/processFrm",
		   dataType:"JSON",
		   data:{
		   	mode:"countdateM",
		   	start_date:selectA,
		   	end_date:selectB,
		   },
		   success: function(resp){
		   	preload('hide');
		   		if(resp.result=="pass"){
					$.ajax({
					   type: "GET",
					   url:  BASEURL+"/dashboard/",
					   data:{
					   	types:"M",
					   	start_date:selectA,
					   	end_date:selectB,
					   },
					   success: function(resp){
					   		window.location.hash = '/dashboard/?types=M&start_date='+selectA+'&end_date='+selectB+"&"+new Date().getTime();
						}
					 });
				}else{
					noticeMessage('Please Check month select !','scriptFocus("#selectMA");');
					return;
				}
			}
		 });
	}else if(types=="Y"){
		var selectA = $('#selectYA').val();
		var selectB = $('#selectYB').val();
		if(selectA==''){
			noticeMessage('Please select Year !','scriptFocus("#selectYA");');
			return;
		}
		if(selectB==''){
			noticeMessage('Please select Year !','scriptFocus("#selectYB");');
			return;
		}
		preload('show');
		$.ajax({
		   type: "POST",
		   url:  BASEURL+"/product/processFrm",
		   dataType:"JSON",
		   data:{
		   	mode:"countdateY",
		   	start_date:selectA,
		   	end_date:selectB,
		   },
		   success: function(resp){
		   	preload('hide');
		   		if(resp.result=="pass"){
					$.ajax({
					   type: "GET",
					   url:  BASEURL+"/dashboard/",
					   data:{
					   	types:"Y",
					   	start_date:selectA,
					   	end_date:selectB,
					   },
					   success: function(resp){
					   		window.location.hash = '/dashboard/?types=Y&start_date='+selectA+'&end_date='+selectB+"&"+new Date().getTime();
						}
					 });
				}else{
					noticeMessage('Please Check Year select !','scriptFocus("#selectYA");');
					return;
				}
			}
		 });
	}else{
		window.location.hash = '/dashboard/?'+new Date().getTime();
	}
	
	
	
	
}
function workingCallback(resp){
	console.log(resp);
	ajaxRequest('');
	preload('hide');
}

function startWorking(){
	alertMessage('Please Confirm to "START WORKING!"','startWorkingCallback');
	//ajaxRequestProcess('utility/startWorking',workingCallback);
}
function startWorkingCallback(){
	ajaxRequestProcess('utility/startWorking',workingCallback);
}
function stopWorking(){
	alertMessage('Please Confirm to "STOP WORKING!"','saveStopCallback');
	//ajaxRequestProcess('utility/startWorking',workingCallback);
}
function saveStopCallback(){
	ajaxRequestProcess('utility/stopWorking',workingCallback);
}

function viewprofile(userid){
	
	ajaxRequestProcess('dashboard/profile/'+userid+'/',profileCallback);
}
function profileCallback(resp){
	preload('hide');
	$('#profileBody').html(resp);
	$('#ProfileModal').modal('show');
}

setInterval(function(){
	/*var d = new Date();
	
	var dd = d.getDate();
	var mm = d.getMonth()+1; //January is 0!
	var yyyy = d.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	} 

	today = dd+'/'+mm+'/'+yyyy;
	
	var currenthour = d.getHours();
	var currentsecond = d.getSeconds();
	var currentminus = d.getMinutes();
	if(currentsecond<10) {
	    currentsecond='0'+currentsecond
	}
	if(currentminus<10) {
	    currentminus='0'+currentminus
	}
	 var texttime = " "+currenthour+" : "+currentminus+" : "+currentsecond*/
	$.ajax({ 
		   type: "GET", 
		   //url:  BASEURL+"/utility/getDateNow/",
		   url:  BASEURL+"/testdate.php",
		   success: function(resp){
		   		if(resp=='F'){
					location.href = BASEURL;
				}
		   		$('#the_time_d').text(resp);
			}
		 });
	
},10000);
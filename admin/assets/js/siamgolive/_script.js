file_name = [];
(function() {

	window.onload = function() {
		// Satnav({
		// 	html5 : false,
		// 	force : true
		// })
		// 	.navigate({
		// 		path : '/?{filter}/?{page}',
		// 		directions : function(params) {
		// 			console.log('directions received');
		// 			console.log(params);
		// 		}
		// 	})
		// 	.change(function(params, old) {
		// 		console.log('change event heard');
		// 		setTimeout(function() {
		// 			Satnav.resolve();
		// 		}, 2000);
		// 		return this.defer;
		// 	})
		// 	.otherwise('/')
		// 	.go();
		Satnav({
			html5: false,
			matchAll: true,
			force: true
		})
		.change(function(hash) {
			//console.log(hash);
			ajaxRequest(hash);
			
		})
		.go();
	};
	
	 

})();

$(function () {
     $.ajaxSetup({ cache:false });
     
    
      
});



$('.sidebar-menu').on('click', 'li.single-menu', function(){
	$('.sidebar-menu .single-menu').removeClass('active');
	$('.sidebar-menu .treeview .treeview-menu').removeClass('menu-open');
	$('.sidebar-menu .treeview .treeview-menu').slideUp("normal");
	$('.sidebar-menu .treeview').removeClass('active');
	
	$(this).addClass('active');
});

function checkFileType(thistarget){
		var file=thistarget.files[0];
		var sizeinbytes =thistarget.files[0].size;
		var file_type =file.name.split('.')[file.name.split('.').length - 1].toLowerCase();
		var Size_mb=1024*1024;
		var _filesize=(sizeinbytes /Size_mb).toFixed(2);
		if(_filesize>5){
			var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
			fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}
			alert("File Size is "+(Math.round(fSize*100)/100)+' '+fSExt[i]+"\n\n"+"File size must be less than 5MB.");
			$(thistarget).attr({ value: '' });
			$(thistarget).val('');
			return false;
	
		}
		switch (file_type.toLowerCase()) {
		case 'jpg':
		case 'png':
		case 'gif':
			return true;
		}
		alert("File Type is : ."+file_type+"\nSupport type : .jpg, .png, .gif");
		$(thistarget).attr({ value: '' });
		$(thistarget).val('');
		return false;
}


function preload(action){
	if(action=='hide'){
		setTimeout(function(){
			//$('#preloadModal').modal('hide');
			$('#newPreload').hide();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		},500);
		
		
	}else{
		/*$('#preloadModal').modal({ 
	      	keyboard: false ,
	      	backdrop:'static'
	      
	      }) ; */
	    $('#newPreload').show();
	}
	
}

function ajaxRequest(hash){
	if(hash==''){
		hash = 'dashboard/';
	}
	preload('show');
	$.ajax({ 
		   type: "GET", 
		   url:  BASEURL+"/"+hash,
		   success: function(resp){
		   		$('#content').html(resp);
		   		loadScriptFile(hash);
			}
		 });
}

function loadScriptFile(hash){
	var mod_l = hash.split('/');
	var module_name = mod_l[0];
	var module_action = 'default';
	if(mod_l[1]!=''){
		module_action = mod_l[1].replace(/\?.*/, "default");
		//alert(module_action);
	}
	if(module_name!=''){
		$.ajax({ 
		   type: "GET", 
		   url:  BASEURL+"/js/"+module_name+"/"+module_action+"/",
		   success: function(resp){
		   		var ojb;
		   		if(resp!='NULL' || resp!=''){
					objc = jQuery.parseJSON(resp);
		   		
			   		if($.isArray(objc)) {		   			
						  getScript(objc,0);
			   		}else{
						preload('hide');
					}
				}else{
					preload('hide');
				}
			}
		 });
	}	
}

function getScript(objc,pointernember){
	nextpointer = parseInt(pointernember)+1;
	var scriptUrl = BASEURL+objc[pointernember];
	//console.log(objc);

		$.getScript(scriptUrl)
		  .done(function( script, textStatus ) {
		    	if(objc[nextpointer]){
					getScript(objc,nextpointer);
				}else{
					preload('hide');
				}
		}).fail(function( jqxhr, settings, exception ) {
		    preload('hide');
		});
	
	
}

function ajaxRequestProcess(hash,callbackcallbackFunction){
	
	preload('show');
	$.ajax({ 
		   type: "GET", 
		   url:  BASEURL+"/"+hash,
		   success: function(resp){
		   		if(callbackcallbackFunction!=null){
					callbackcallbackFunction(resp);
				}else{
					preload('hide');
				}
		   		
			}
		 });
}

function alertMessage(messagevalue,callbackfunction){
	
	$('#messagevalue').text(messagevalue);
	$('.alertsave').attr('data-function',callbackfunction);
	
	$('#alertModal').modal({ 
      	keyboard: false ,
      	backdrop:'static'
      
      }) ; 
	
	
}

function scriptFocus(selecttor){
	$(selecttor).focus();
}

function noticeMessage(messagevalue,callbackfunction){
	
	$('#messagenotice').text(messagevalue);
	if(callbackfunction!=null){
		$('.noticesave').attr('onclick',callbackfunction);
	}
	
	$('#noticeModal').modal({ 
      	keyboard: false ,
      	backdrop:'static'
      
      }) ; 
	
	
}

$(function(){
	$('body').on('click', '.alertsave', function(){ 
			$('#alertModal').modal('hide');	
			var datafunction = $(this).attr('data-function');
			var fn = window[datafunction];
			setTimeout(function(){
				if (typeof fn === "function") fn();
			},600);
	});

});

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
	 var texttime = " "+today+" - "+currenthour+" : "+currentminus+" : "+currentsecond*/
	
	//$('#the_time').text(texttime);
	
	$.ajax({ 
		   type: "GET", 
		  // url:  BASEURL+"/utility/getDateNow/",
		  url:  BASEURL+"/testdate.php",
		   success: function(resp){
		   		if(resp=='F'){
					location.href = BASEURL;
				}
		   		$('#the_time').text(resp);
			}
		 });
	
},10000);




var Base64 = {
// private property
_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

// public method for encoding
encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;

    input = Base64._utf8_encode(input);

    while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output +
        Base64._keyStr.charAt(enc1) + Base64._keyStr.charAt(enc2) +
        Base64._keyStr.charAt(enc3) + Base64._keyStr.charAt(enc4);

    }

    return output;
},

// public method for decoding
decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    while (i < input.length) {

        enc1 = Base64._keyStr.indexOf(input.charAt(i++));
        enc2 = Base64._keyStr.indexOf(input.charAt(i++));
        enc3 = Base64._keyStr.indexOf(input.charAt(i++));
        enc4 = Base64._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }

    }

    output = Base64._utf8_decode(output);

    return output;

},

// private method for UTF-8 encoding
_utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
},

// private method for UTF-8 decoding
_utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }
    return string;
}
}


function numberonly(evt){
	
	/*setTimeout(function(){
		selecter.value = selecter.value.replace(/[^0-9\.]/g,'');
	},100);*/
		var e = evt;
		if(window.event){ // IE
			var charCode = e.keyCode;
			if (((charCode < 48) || (charCode > 57)) && (charCode != 13) && (charCode != 8) && charCode != 46) window.event.returnValue = false;
		} else if (e.which) { // Safari 4, Firefox 3.0.4
			var charCode = e.which
			if (((charCode < 48) || (charCode > 57)) && (charCode != 13) && (charCode != 8) && charCode != 46) charCode = e.preventDefault(); 
		}
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}



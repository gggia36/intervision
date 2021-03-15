
var chackEventOperation = 'Y';

if(typeof EventOperation == 'undefined'){
    chackEventOperation = 'T';
}



var EventOperation = { 
    init : function(){
        $("#event_form" ).on( "click", ".btnRegister", function(e) {
           EventOperation.updateEvent_Team(this);
        });
        $("#event_form" ).on( "click", "#btnRegister_single", function() {
           EventOperation.updateEvent_Single();
        });
        $("#event_form" ).on( "change", ".team_set", function(e) {
          EventOperation.changeTypeEvent(this);
        });
        $("#event_form" ).on( "keyup", ".coupons", function(e) {

            var keydata = $(this).val();
            if (keydata.length > 3) {
                EventOperation.check_coupons_Team(this);
            }else{
                $('.couponsInfo').hide();
            }
          
        });
        $("#event_form" ).on( "keyup", "#coupons_single", function(e) {

            var keydata = $(this).val();
            if (keydata.length > 3) {
                EventOperation.check_coupons_Single(this);
            }else{
                $('#couponsInfo_single').hide();
            }
          
        });
        $("#event_form" ).on( "click", ".user_team_list", function() {
           EventOperation.get_DataUser(this);
        });
        $("#page-contents" ).on( "click", "#btn-login", function() {
           EventOperation.check_login();
        });


   },
   start : function(){

   },

   check_login : function(){
        var email_user       = $('#email_user').val();
        var password_user     = $('#password_user').val();

        if(email_user==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์'
            });
            $('#email_user').focus();
            return;
        }

        if (!validateEmail(email_user)) {
            Lobibox.notify('warning', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์ให้ถูกต้อง'
            });
            $('#email_user').focus();
            return;
        } 

        if(password_user==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกรหัสผ่าน'
            });
            $('#password_user').focus();
            return;
        }

        $('#preloader').fadeIn();

        var params = $('#login-form').serialize();

        $.ajax({ 
           type: "POST", 
           url:  BASEURL+"/home/check_login/",
           data: params,
           dataType:'json',
            success: function(resp){   
                
                var count_event = $('#count_event').val();

                setTimeout(function(){ 

                $('#preloader').fadeOut();

                if(resp!=0){
                    
                        if(count_event>1){
                            for (i = 1; i <= count_event; i++) { 

                                $('#team_name_'+i).val(resp.user_team);
                                $('#name_head_'+i).val(resp.user_name);
                                $('#id_card_head_'+i).val(resp.id_card);
                                $('#contact_head_'+i).val(resp.user_phone_number);
                                $('#address_head_'+i).val(resp.user_address);
                                $('#province_head_'+i).val(resp.user_province);
                                $('#zip_code_head_'+i).val(resp.id_card);
                                $('#email_head_'+i).val(resp.user_email);
                                $('#country_head_'+i).val(resp.user_country);
                                $('#country_head_'+i).trigger('change'); // Notify any JS components that the value changed
                                $('#blood_head_'+i).val(resp.user_blood);
                                $('#tel_other_'+i).val(resp.user_phone_other);

                                $('#myModal_login').modal('hide');
                                
                            }
                        }
                    
                }else{
                    
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกอีเมล์และพาสเวริด์ให้ถูกต้อง'
                    });
                    
                    return;
                }

                }, 1500);
            }

        });
   },

   updateEvent_Team : function(elems){

        var id = $(elems).attr('data_type_cate_id');
        
        var team_set = $('#team_set_'+id).val();
        var team_name = $('#team_name_'+id).val();
        var name_head = $('#name_head_'+id).val();
        var id_card_head = $('#id_card_head_'+id).val();
        var contact_head = $('#contact_head_'+id).val();
        var address_head = $('#address_head_'+id).val();
        var province_head = $('#province_head_'+id).val();
        var zip_code_head = $('#zip_code_head_'+id).val();
        var email_head = $('#email_head_'+id).val();
        var country_head = $('#country_head_'+id).val();
        var blood_head = $('#blood_head_'+id).val();
        var shirt_head = $('#shirt_head_'+id).val();
        var tel_other = $('#tel_other_'+id).val();
        var user_status_type = $('#user_status_type_'+id).val();

        if(team_set==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณาเลือกประเภทการแข่งขัน'
            });
            $('#team_set_'+id).focus();
            return;
        }

        if(team_name=='' && user_status_type!='S'){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกชื่อทีม'
            });
            $('#team_name_'+id).focus();
            return;
        }

        if(name_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกชื่อ-นามสกุล'
            });
            $('#name_head_'+id).focus();
            return;
        }

        if(id_card_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเลขบัตรประชาชน'
            });
            $('#id_card_head_'+id).focus();
            return;
        }

        if(contact_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเบอร์ติดต่อ'
            });
            $('#contact_head_'+id).focus();
            return;
        }

        if(tel_other==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเบอร์ติดต่อบุคคลอื่นกรณีฉุกเฉิน'
            });
            $('#tel_other_'+id).focus();
            return;
        }

        if(address_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกที่อยู่'
            });
            $('#address_head_'+id).focus();
            return;
        }

        if(province_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกจังหวัด'
            });
            $('#province_head_'+id).focus();
            return;
        }

        if(zip_code_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกรหัสไปรษณีย์'
            });
            $('#zip_code_head_'+id).focus();
            return;
        }

        if(email_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์'
            });
            $('#email_head_'+id).focus();
            return;
        }

        if (!validateEmail(email_head)) {
            Lobibox.notify('warning', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์ให้ถูกต้อง'
            });
            $('#email_head_'+id).focus();
            return;
        } 

        if(country_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกประเทศ'
            });
            $('#country_head_'+id).focus();
            return;
        }

        if(blood_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกกรุ๊ปเลือด'
            });
            $('#blood_head_'+id).focus();
            return;
        }

        if(shirt_head==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณาเลือกไซต์เสื้อ'
            });
            $('#shirt_head_'+id).focus();
            return;
        }

        var count_user = $('#user_all_'+id).val();

        if(count_user>1){
            for (i = 1; i < count_user; i++) { 
                var name_user = $('#name_user_'+id+'_'+i).val();
                var id_card_user = $('#id_card_user_'+id+'_'+i).val();
                var tel_user = $('#tel_user_'+id+'_'+i).val();
                var email_user = $('#email_user_'+id+'_'+i).val();
                var country_user = $('#country_user_'+id+'_'+i).val();
                var blood_user = $('#blood_user_'+id+'_'+i).val();
                var shirt_user = $('#shirt_user_'+id+'_'+i).val();

                // Set Old Email
                if(i>1){

                    var j = i-1

                    var email_user_old = $('#email_user_'+id+'_'+j).val();

                }else{
                    var email_user_old = '';
                }


                if(name_user=='' ){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกชื่อ'
                    });
                    $('#name_user_'+id+'_'+i).focus();
                    return;
                }

                if(id_card_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกเลขบัตรประชาชน'
                    });
                    $('#id_card_user_'+id+'_'+i).focus();
                    return;
                }

                if(tel_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกเบอร์ติดต่อ'
                    });
                    $('#tel_user_'+id+'_'+i).focus();
                    return;
                }

                if(email_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกอีเมล์'
                    });
                    $('#email_user_'+id+'_'+i).focus();
                    return;
                }

                if (!validateEmail(email_user)) {
                    Lobibox.notify('warning', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกอีเมล์ให้ถูกต้อง'
                    });
                    $('#email_user_'+id+'_'+i).focus();
                    return;
                } 

                if(email_user==email_head){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกอีเมล์ไม่ซ้ำกัน'
                    });
                    $('#email_user_'+id+'_'+i).focus();
                    return;
                }

                if(email_user==email_user_old){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกอีเมล์ไม่ซ้ำกัน'
                    });
                    $('#email_user_'+id+'_'+i).focus();
                    return;
                }

                if(country_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกประเทศ'
                    });
                    $('#country_user_'+id+'_'+i).focus();
                    return;
                }

                if(blood_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณากรอกกรุ๊ปเลือด'
                    });
                    $('#blood_user_'+id+'_'+i).focus();
                    return;
                }

                if(shirt_user==''){
                    Lobibox.notify('error', {
                        title:'ข้อผิดผลาด',
                        sound: false,
                        msg: 'กรุณาเลือกไซต์เสื้อ'
                    });
                    $('#shirt_user_'+id+'_'+i).focus();
                    return;
                }
            }
        }

        Lobibox.confirm({
            title: 'Do you confirm your register?',
            msg: "Are you sure Register?",
            callback: function ($this, type, ev) {
                if (type === 'yes') {
                    $('#preloader').fadeIn();
                    $('.btnRegister').attr('disabled','disabled');
                    var params = $('#register_event_'+id).serialize();

                    params += '&type_cate_id='+id;

                    $.ajax({ 
                       type: "POST", 
                       url:  BASEURL+"/home/register_event/",
                       data: params,
                        success: function(resp){ //alert(resp);return;
                                                    
                            // Lobibox.notify('success', {
                            //     msg: 'You have check Email and payment.'
                            // });    
                            if(resp!=0){

                                $('#payment_form').html(resp);

                                $('#preloader').fadeOut();  

                                $('#myModal_payment').modal('show');

                                var category_id = $('#category_id_team_'+id).val();

                                setTimeout(function() { window.location.href = BASEURL+'/event/'+category_id; }, 20000 );    
                            }else{

                                $('#preloader').fadeOut(); 

                                $('.btnRegister').removeAttr('disabled');

                                Lobibox.notify('error', {
                                    title:'ข้อผิดผลาด',
                                    sound: false,
                                    delay: false,
                                    msg: 'อีเมล์นี้ได้ถูกใช้ไปแล้ว กรุณาเปลี่ยนอีเมล์'
                                });
                            }
                        }

                    });
                    
                }
            }
        });
   },
   updateEvent_Single:function(){
        var single_type_id      = $('#single_type_id').val();
        var team_name_single    = $('#team_name_single').val();
        var name_single         = $('#name_single').val();
        var id_card_single      = $('#id_card_single').val();
        var birth_single        = $('#birth_single').val();
        var contact_single      = $('#contact_single').val();
        var tel_single_other    = $('#tel_single_other').val();
        var address_single      = $('#address_single').val();
        var province_single     = $('#province_single').val();
        var zip_code_single     = $('#zip_code_single').val();
        var country_single      = $('#country_single').val();
        var email_single        = $('#email_single').val();
        var gender_single       = $('#gender_single').val();
        var blood_single        = $('#blood_single').val();
        var shirt_single        = $('#shirt_single').val();

        if(single_type_id==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณาเลือกประเภทการแข่งขัน'
            });
            $('#single_type_id').focus();
            return;
        }

        if(team_name_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกชื่อทีม'
            });
            $('#team_name_single').focus();
            return;
        }


        if(name_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกชื่อ-นามสกุล'
            });
            $('#name_single').focus();
            return;
        }

        if(id_card_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเลขบัตรประชาชน'
            });
            $('#id_card_single').focus();
            return;
        }

        if(birth_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเลขบัตรประชาชน'
            });
            $('#birth_single').focus();
            return;
        }

        if(contact_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเบอร์ติดต่อ'
            });
            $('#contact_single').focus();
            return;
        }

        if(tel_single_other==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกเบอร์ติดต่อบุคคลอื่นกรณีฉุกเฉิน'
            });
            $('#tel_single_other').focus();
            return;
        }

        if(address_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกที่อยู่'
            });
            $('#address_single').focus();
            return;
        }

        if(province_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกจังหวัด'
            });
            $('#province_single').focus();
            return;
        }

        if(zip_code_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกรหัสไปรษณีย์'
            });
            $('#zip_code_single').focus();
            return;
        }

        if(email_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์'
            });
            $('#email_single').focus();
            return;
        }

        if (!validateEmail(email_single)) {
            Lobibox.notify('warning', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกอีเมล์ให้ถูกต้อง'
            });
            $('#email_single').focus();
            return;
        } 


        if(country_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกประเทศ'
            });
            $('#country_single').focus();
            return;
        }

        if(gender_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณาเลือกเพศ'
            });
            $('#gender_single').focus();
            return;
        }

        if(blood_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณากรอกกรุ๊ปเลือด'
            });
            $('#blood_single').focus();
            return;
        }

        if(shirt_single==''){
            Lobibox.notify('error', {
                title:'ข้อผิดผลาด',
                sound: false,
                msg: 'กรุณาเลือกไซต์เสื้อ'
            });
            $('#shirt_single').focus();
            return;
        }


        Lobibox.confirm({
            title: 'Do you confirm your register?',
            msg: "Are you sure Register?",
            callback: function ($this, type, ev) {
                if (type === 'yes') {
                    $('#preloader').fadeIn();
                    $('#btnRegister_single').attr('disabled','disabled');
                    var params = $('#register_event_single').serialize();

                    $.ajax({ 
                       type: "POST", 
                       url:  BASEURL+"/home/register_event_single/",
                       data: params,
                        success: function(resp){   
                            $('#preloader').fadeOut();                            
                            // Lobibox.notify('success', {
                            //     msg: 'You have check Email and payment.',
                            //     sound: false
                            // });  

                            $('#payment_form').html(resp);
                            $('#myModal_payment').modal('show');

                            // var category_id = $('#category_id_single').val();
                            
                            // setTimeout(function() { window.location.href = BASEURL+'/event/'+category_id; }, 5000 );        
                        }

                    });
                    
                }
            }
        });

   },
   changeTypeEvent : function(elems){
        var id = $(elems).attr('data_type_id');
        var set_user = $("#team_set_"+id).val();
        var price = $('#price_'+id).val();
        var params = 'user_count='+set_user+'&type_cate_id='+id;
        var type_id = $(elems).find(':selected').attr('data_type_id');

        $.ajax({ 
           type: "POST", 
           url:  BASEURL+"/home/user_set/",
           data: params,
            success: function(resp){   

                $('#type_id_team_'+id).val(type_id);
                $('#team_user_'+id).html(''); 
                $('#team_user_'+id).html(resp); 

                $('#coupons_'+id).val('');
                $('#discount_'+id).val(0);
                $('#couponsInfo_'+id).hide();

                var user_all = $('#user_all_'+id).val();
          
                if(user_all>1){
                    var set_price =  user_all*price;
                    $('#user_status_type_'+id).val('H');
                    $('#team_name_'+id).show();
                    $('#note_'+id).show();
                }else{
                    var set_price =  price;
                    $('#user_status_type_'+id).val('S');
                    $('#team_name_'+id).hide();
                    $('#note_'+id).hide();
                }            

                $('#total_price_'+id).val(set_price);
                $('#strTotal_'+id).text(''); 
                $('#strTotal_'+id).text(set_price.toLocaleString("en")); 
            }

        });
   },
   check_coupons_Team : function(elems){

        var id = $(elems).attr('data_type_cate_id');

        var data_coupon = $(elems).val();

        var params = "coupon_code="+data_coupon;

        $.ajax({ 
           type: "POST", 
           url:  BASEURL+"/home/coupons_check/",
           data: params,
           dataType: 'json',
            success: function(resp){  console.log(resp); 

                var price = $('#total_price_'+id).val();

                if(resp==0){
                    var total_net = price-0;
                    $('#coupon_status_team_'+id).val('N');
                    $('#couponsInfo_'+id).removeClass('label-success').text('');
                    $('#couponsInfo_'+id).addClass('label-danger').text('คูปองนี้ไม่สามรถใช้งานได้');
                    $('#couponsInfo_'+id).show();
                    $('#strTotal_'+id).text('');
                    $('#strTotal_'+id).text(total_net.toLocaleString("en"));
                }else{
                    $('#coupon_status_team_'+id).val('Y');
                    $('#couponsInfo_'+id).removeClass('label-danger').text('');
                    $('#couponsInfo_'+id).addClass('label-success').text('คูปองนี้ใช้งานได้');
                    $('#couponsInfo_'+id).show();

                    var discount = resp.coupon_value;

                    if(resp.coupon_type=='P'){
                        var total_discount = (price*discount)/100;
                        var total_net = price-total_discount;
                    }else{
                        var total_discount = price-discount;
                        var total_net = total_discount;
                    }
                    

                    $('#strTotal_'+id).text('');
                    $('#strTotal_'+id).text(total_net.toLocaleString("en"));
                    $('#discount_'+id).val(total_discount);
                }
                return; 

            }

        });  

   },
   check_coupons_Single : function(elems){

        var data_coupon = $(elems).val();

        var params = "coupon_code="+data_coupon;


        $.ajax({ 
           type: "POST", 
           url:  BASEURL+"/home/coupons_check/",
           data: params,
           dataType: 'json',
            success: function(resp){  console.log(resp); 

                var price = $('#price_single').val();

                if(resp==0){

                    var total_net = price-0;
                    $('#coupon_status_single').val('N');
                    $('#couponsInfo_single').removeClass('label-success').text('');
                    $('#couponsInfo_single').addClass('label-danger').text('คูปองนี้ไม่สามรถใช้งานได้');
                    $('#couponsInfo_single').show();
                    $('#strTotal_single').text('');
                    $('#strTotal_single').text(total_net.toLocaleString("en"));
                }else{
                    $('#coupon_status_single').val('Y');
                    $('#couponsInfo_single').removeClass('label-danger').text('');
                    $('#couponsInfo_single').addClass('label-success').text('คูปองนี้ใช้งานได้');
                    $('#couponsInfo_single').show();

                    var discount = resp.coupon_value;
                    var total_discount = (price*discount)/100;
                    var total_net = price-total_discount;

                    $('#strTotal_single').text('');
                    $('#strTotal_single').text(total_net.toLocaleString("en"));
                    $('#discount_single').val(total_discount);
                }
                return; 

            }

        }); 

   },
   get_DataUser : function(elems){
        var user_id = $(elems).attr('data_user_id');
        var params = "user_id="+user_id;

        $.ajax({ 
           type: "POST", 
           url:  BASEURL+"/home/get_data_userTeam/",
           data: params,
            success: function(resp){   

                $('#list_team_user').html(resp);   
                $('#myModal_team').modal('show');     
            }

        });
   },

}





if(chackEventOperation=='T'){
   EventOperation.start();
}
EventOperation.init();

$(document).ready(function(){

    $(".lang_set_view").click(function(e){
        var data_lang = $(this).attr('data_lang');

        var params = 'data_lang='+data_lang;

        $('.preloader').fadeIn();

        if(data_lang!=''){
            $.ajax({
                type: "POST",
                url: BASEURL + "/blog/change_lang/",
                data: params,
                success: function(resp) {
                   
                    $('.preloader').fadeOut();

                    location.reload();
                }   
            });
        }

        
    });

    // Go to top

    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if (st > 150){
           $('#go-to-top').fadeIn();
       } else {
          $('#go-to-top').fadeOut();
       }
     
    });


    $('#go-to-top').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 700);
        return false;
    });

    $('#open-popup').click(function(){
        showMailingPopUp();

    });

    function showMailingPopUp() {
        document.cookie = "MCPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us4.list-manage.com","uuid":"61f734c1075abf0d234f91a32","lid":"4d6f528aa4","uniqueMethods":true}) })
    };


     $(".listen_link").hover(function(){
        $('.listen_active').hide();
        var id_active = $(this).attr('data_id');
        var html_content_active = $('.listen_desc_'+id_active).html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        var img_circle = $(this).attr('data_img');
        $('.img_set_course').attr('src',img_circle);

        StopOnline();

    }, function(){
        $('.listen_active').hide();
        $('.menu_listen a').removeClass('active');
        var html_content_active = $('.listen_active_default').html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        var img_circle = $('#listen_link_1').attr('data_img');
        $('.img_set_course').attr('src',img_circle);

    });

    $(".listen_link").click(function(){
        $('.listen_active').hide();
        var id_active = $(this).attr('data_id');
        var html_content_active = $('.listen_desc_'+id_active).html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        var img_circle = $(this).attr('data_img');
        $('.img_set_course').attr('src',img_circle);
    });

    $(".slide-btn-left").click(function(){
        $('.listen_active').hide();
        var data_active = $('.img_set_course').attr('data_active');

        if(data_active==0 || next_step==0){
            data_active = 9;
        }


        var next_step = parseInt(data_active) - 1;

        
        $('#listen_link_'+data_active).removeClass('active');
        $('#listen_link_'+next_step).addClass('active');

        var img_circle = $('#listen_link_'+next_step).attr('data_img'); 
        $('.img_set_course').attr('src',img_circle);

        // Content Desc
        var html_content_active = $('.listen_desc_'+next_step).html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        if(data_active==9){
            $('#listen_link_1').removeClass('active');
        }

        if(next_step==1){
           $('.img_set_course').attr('data_active',9);
        }else{    
            $('.img_set_course').attr('data_active',next_step);
        }


    });

    $(".slide-btn-right").click(function(){
        $('.listen_active').hide();
        var data_active = $('.img_set_course').attr('data_active');

        if(data_active==8){
            data_active = 0;
        }

         if(data_active==9){
            data_active = 1;
        }

        var next_step = parseInt(data_active) + 1;

        
        $('#listen_link_'+data_active).removeClass('active');
        $('#listen_link_'+next_step).addClass('active');

        var img_circle = $('#listen_link_'+next_step).attr('data_img'); 
        $('.img_set_course').attr('src',img_circle);

        // Content Desc
        var html_content_active = $('.listen_desc_'+next_step).html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        if(data_active==0){
            $('#listen_link_2').removeClass('active');
        }

        if(next_step==8){
           $('.img_set_course').attr('data_active',8);
        }else{    
            $('.img_set_course').attr('data_active',next_step);
        }


    });


    $("body").on('submit','#FrmSearch_blog',function(event){
        var search_blog = $('#search_blog').val();

        if(search_blog!=''){
            $('.preloader').fadeIn();

            var params = $('#FrmSearch_blog').serialize();
            
            $.ajax({
                type: "POST",
                url: BASEURL + "/blog/blog_search/",
                data: params,
                success: function(resp) {
                   
                    $('.preloader').fadeOut();

                    $('#page-contents').html(resp);

                    $(window.opera ? 'html' : 'html, body').animate({
                          scrollTop: 0
                      }, 'slow');
                }   
            });
        }else{
            Swal.fire({
              title: 'Please insert blog name',
              type: 'warning',
              showCloseButton: false
            })
        
            return false;
        }
    });

    $("body").on('click','#search_btn',function(event){
        var search_blog = $('#search_blog').val();

        if(search_blog!=''){
            $('.preloader').fadeIn();

            var params = $('#FrmSearch_blog').serialize();
            
            $.ajax({
                type: "POST",
                url: BASEURL + "/blog/blog_search/",
                data: params,
                success: function(resp) {
                    console.log(resp);
                    $('.preloader').fadeOut();

                    $('#page-contents').html(resp);

                    $(window.opera ? 'html' : 'html, body').animate({
                          scrollTop: 0
                      }, 'slow');
                }   
            });
        }else{
            Swal.fire({
              title: 'Please insert blog name',
              type: 'warning',
              showCloseButton: false
            })
        
            return false;
        }
    });

    $("body").on('click','.menu_used_case',function(event){
        var id = $(this).attr('data_id');

        $('#use_case_active').val(id);

        StopUsedcase();
    });

 
    var menu_used_case = $('.menu_used_case').length;
    
    if(menu_used_case>0){

        function LoopUsedcase() {
           
            var default_use_case_active = $('#use_case_active').val();

            $('.menu_used_case').removeClass('active');

            $('.tab_content_set').removeClass('in active');

            if(default_use_case_active==6){
                $('#use_case_active').val(1);

                $('.active1').addClass('active');

                $('#menu1').addClass('in active');

            }else{
                var active_use_case = parseInt(default_use_case_active) + 1;

                $('#use_case_active').val(active_use_case);

                $('.active'+active_use_case).addClass('active');

                $('#menu'+active_use_case).addClass('in active');
            }
        }

        var interval = setInterval(function(){LoopUsedcase()},3000);
        
    }

    

    function StopUsedcase() {
      
      clearInterval(interval);
    }



    // Online
    var listen_link = $('.listen_link').length;
    
    if(listen_link>0){

        function LoopOnline() {
           
            $('.slide-btn-right').click();
        }

        var interval_online = setInterval(function(){LoopOnline()},5000);
        
    }

    

    function StopOnline() {
      clearInterval(interval_online);
    }
});


$('#home_slide').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});

$('#platform_slide').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});


function myFunction(){
        if($('#firstname').val()==''){
            Swal.fire({
              title: 'Please insert firstname',
              type: 'warning',
              showCloseButton: false
            })
            return false;

        }
        if($('#lastname').val()==''){
            Swal.fire({
              title: 'Please insert lastname',
              type: 'warning',
              showCloseButton: false
            })

            return false;
        }
        if($('#business_email').val()==''){
            Swal.fire({
              title: 'Please insert business email address',
              type: 'warning',
              showCloseButton: false
            })

            return false;
        }
        if($('#company').val()==''){
            Swal.fire({
              title: 'Please insert company',
              type: 'warning',
              showCloseButton: false
            })

            return false;
        }
        if($('#phone').val()==''){
            Swal.fire({
              title: 'Please insert phone number',
              type: 'warning',
              showCloseButton: false
            })
        
            return false;
        }

        // Swal.fire({
        //   title: 'Are you sure !',
        //   type: 'question',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Yes'
        //     }).then((result) => {
        //       if (result.value) {

                $('.preloader').fadeIn();

                var params = $('#contactFrm').serialize();
                
                $.ajax({
                    type: "POST",
                    url: BASEURL + "/contact_us/sendmail/",
                    data: params,
                    success: function(resp) {
                        if(resp==1){
                            $('.preloader').fadeOut();
                            Swal.fire({
                                type: 'success',
                                timer: 3000,
                                title: 'Thank you.',
                                html: 'Your request has been submitted.<br/>Our team will contact you soon.',
                                showConfirmButton: false
                            })

                            setTimeout(function(){ 
                                window.location.href = BASEURL;
                            }, 3500);
                            
                        }else{
                            $('.preloader').fadeOut();
                            Swal.fire({
                                type: 'error',
                                title: 'Error.',
                                showConfirmButton: true
                            })
                        }
                    }
                });

                
            // }else{
            //     $('.preloader').fadeOut();
            // }
        //});


        return;


    }
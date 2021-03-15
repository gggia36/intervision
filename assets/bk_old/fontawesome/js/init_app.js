$(document).ready(function(){
     $(".listen_link").hover(function(){
        $('.listen_active').hide();
        var id_active = $(this).attr('data_id');
        var html_content_active = $('.listen_desc_'+id_active).html();
        $('.listen_active').html(html_content_active);
        $('.listen_active').addClass('animated fadeInUp');
        $('.listen_active').fadeIn();

        var img_circle = $(this).attr('data_img');
        $('.img_set_course').attr('src',img_circle);

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
            $('#listen_link_8').removeClass('active');
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
                    console.log(resp);
                    $('.preloader').fadeOut();

                    $('#page-contents').html(resp);
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
    loop:false,
    margin:10,
    nav:false,
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
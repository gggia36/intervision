$(".btn_platform_scroll").click(function(e){
  	var data_id = $(this).attr('data-id');

  	$('html,body').animate({
        scrollTop: $("#platform_" + data_id).offset().top
    }, 2000);

    $('.btn_platform_scroll').removeClass('active');

    $(this).addClass('active');
});


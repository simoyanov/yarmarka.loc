new WOW().init();
function showOpisBox(n){
    for(i=1;i<5;i++){
        if (i !== n){
            $("#opisBox"+i+"").removeClass('fade-in');
            $("#medal"+i+"").css("opacity","1");
        } else {
             $("#opisBox"+i+"").addClass('fade-in');
                $("#medal"+i+"").css("opacity","0");
        }
    }
}
$(function() {
    $(".opis-box").hover(
        function(){
            for(i=1;i<5;i++){
            $("#opisBox"+i+"").removeClass('fade-in');
            $("#medal"+i+"").css("opacity","1");
        }
        }
    );
    
});
/*********************************************************/
$(window).scroll(function () {
    if($('.menu').offset().top + 100 >= $(document).scrollTop())
    {
        $('.menu-mini').removeClass("visible");
    }
    else
    {
        $('.menu-mini').addClass("visible");
    }
    
    if($('.map-menu').offset().top - 50 >= $(document).scrollTop())
    {
        $('.map-menu-mini').removeClass("mini-visible");
    }
    else if($('.map-menu').offset().top + 450 <= $(document).scrollTop())
    {
        $('.map-menu-mini').removeClass("mini-visible");
    } else
    {
        $('.map-menu-mini').addClass("mini-visible");
    }
    
    if($('.map-menu').offset().top <= $('.map-menu-mini').offset().top)
    {
        $('.map-menu').css("opacity","0");
    } else {
        $('.map-menu').css("opacity","1");
    }
    if($('.menu-dummy').offset().top > 50){
        $('.menu-dummy').css("top","0");
    }else{
        $('.menu-dummy').css("top","50px");
    }
});

/***********************************************/
/**
 * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
 */
$(function() {
    function reposition() {
        var modal = $(this),
            dialog = modal.find('.map-modal-dialog');
        modal.css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });
});
/***********************************************/
        
        
function scrollToDiv(e){
    var o = $(e).offset();
    var ot = o.top;
    var ts = ot - 50;
    $('body,html').stop().animate({ scrollTop: ts }, 500);
    return false;
}
        
        
$(document).ready(function(){
  $('.people-slider').slick({
        infinite: false,
      slidesToShow: 4,
      speed: 500,
      slidesToScroll: 4,
      responsive: [{
          breakpoint: 1270,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },{
          breakpoint: 1000,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },{
          breakpoint: 760,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }]
  });
    $('.people-slider-mini').slick({
        infinite: false,
      slidesToShow: 1,
      speed: 500,
      slidesToScroll: 1
  });

    $('.spec-slider').slick({
          infinite: false,
              slidesToShow: 4,
              slidesToScroll: 4,
            responsive: [{
                  breakpoint: 1270,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },{
                  breakpoint: 970,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },{
                  breakpoint: 750,
                  settings: "unslick"
                }]
        });
    $('.spec-slider-mini').slick({
        infinite: false,
      slidesToShow: 1,
      speed: 500,
      slidesToScroll: 1
  });

        $('.spec-modal-slider').slick({
          infinite: false,
              slidesToShow: 1,
              slidesToScroll: 1
        });
        $('.fermer-modal-slider').slick({
          infinite: false,
              slidesToShow: 1,
              slidesToScroll: 1
        });



}); 
        
 $(".map-modal").ready(function() {
    $('.map-popup-slider').slick({
          infinite: false,
              slidesToShow: 1,
              slidesToScroll: 1
        });
 });


$(document).ready(function(){
    $('.btn-click').click(function(){
        if ( $(this).attr('data-type')) {
            var type_place = $(this).attr('data-type');
            filtermap.getInfoAboutPlaces(type_place);
        }
        var a = $(this).attr('btn-click');
        return scrollToDiv(a);
        
    });
    $('.menu_1').click(function(){showOpisBox(1);});
    $('.menu_2').click(function(){showOpisBox(2);});
    $('.menu_3').click(function(){showOpisBox(3);});
    $('.menu_4').click(function(){showOpisBox(4);});
    $('.map-menu button').click(function(){
        $(this).addClass('active');
        var btn_id = this.id;
        btn_id = btn_id.slice(7,8);
        btn_id = parseInt(btn_id,10);
        $('.map-but'+btn_id+'').addClass('active');
        for(i = 1; i <= 5; i++){
            if (i !== btn_id){
                $('.map-but'+i+'').removeClass('active');
            }
        }
    });
    $('.map-menu-mini button').click(function(){
        $(this).addClass('active');
        var btn_id = this.id;
        btn_id = btn_id.slice(12,13);
        btn_id = parseInt(btn_id,10);
        for(i = 1; i <= 5; i++){
            if (i !== btn_id){
                $('.map-but'+i+'').removeClass('active');
            }
        }
    });     
});
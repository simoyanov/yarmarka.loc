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
//                  settings: "unslick"
                    settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
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
    function removeFilters(e){
        for(i = 1; i <= 5; i++){
            if (i !== e){
                $('.map-but'+i+'').removeClass('active');
            }
        }
    }
    
    $('.map-menu button').click(function(){
        $(this).addClass('active');
        var btn_id = this.id;
        btn_id = btn_id.slice(7,8);
        btn_id = parseInt(btn_id,10);
        $('.map-but'+btn_id+'').addClass('active');
        removeFilters(btn_id);
    });
    $('.map-menu-mini button').click(function(){
        $(this).addClass('active');
        var btn_id = this.id;
        btn_id = btn_id.slice(12,13);
        btn_id = parseInt(btn_id,10);
        $('.map-but'+btn_id+'').addClass('active');
        removeFilters(btn_id);
    });  
    $('.bottom-align button').click(function(){
        var btnAtr = $(this).attr('data-type');
        if (btnAtr == 17){
            $('.map-but1').addClass('active');
            removeFilters(1);
        } else if (btnAtr == 18){
            $('.map-but2').addClass('active');
            removeFilters(2);
        } else if (btnAtr == 19){
            $('.map-but3').addClass('active');
            removeFilters(3);
        } else if (btnAtr == 20){
            $('.map-but4').addClass('active');
            removeFilters(4);
        }
    });
});
function mapModal(){
        if($(".map-modal .modal-dialog .modal-content .container-fluid").height() < $(window).height() && $(window).width() <= 768){
            $(".map-modal .modal-dialog .modal-content .container-fluid").addClass('bottom-line');
            var closeTop = 10;
            closeTop += $(window).height() - $(".map-modal .modal-dialog .modal-content .container-fluid").height();
            $('.map-modal .close').css("top", closeTop)
        } else if($(window).width() <= 768){
            $(".map-modal .modal-dialog .modal-content .container-fluid").removeClass('bottom-line');
            $('.map-modal .close').css("top", "10px");
        }
    }

$(document).ready(function(){
    if($(window).width() <= 768){mapModal();}
    $(".map-modal .modal-dialog .modal-content .container-fluid").resize(function(){
        mapModal();
    });
    $(window).resize(function(){
      if($(window).width() <= 768){
          mapModal();
      } else {
        $('.map-modal .close').css("top", "-30px")
      }
    });
});

var scene = document.getElementById('scene');
var parallax = new Parallax(scene);

$(function(){
    $.stellar({
        horizontalScrolling: false,
        verticalOffset: 40
    });
});



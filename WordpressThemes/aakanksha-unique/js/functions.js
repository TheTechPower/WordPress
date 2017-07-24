window.addEventListener("load", function () {
    var load_screen = document.getElementById("load_screen");
    //document.body.removeChild(load_screen);
    jQuery(load_screen).fadeOut('slow');
         event.preventDefault();
});
    jQuery(document).ready(function($) { 
    $('a[href="#search"]').on('click', function(event) {
        $('#search').addClass('open');
        $('#search > form > input[type="text"]').focus();
        event.preventDefault();
        
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
});

jQuery(document).ready(function($) {
/*$.scrollify({
easing: "easeOutExpo",
  scrollSpeed: 1100,

  // A distance in pixels to offset each sections position by.
  offset : 0,

  // A boolean to define whether scroll bars are visible or not.

  scrollbars: true,
  axis:"y",

  target:"html,body",

  // A string of selectors for elements that require standard scrolling behaviour.

  standardScrollElements: false,
  setHeights: false,
  // callbacks
  before:function() {},
  after:function() {},
  afterResize:function() {},
  afterRender:function() {}
});*/
});

/*$(window).scroll(function(){
  var wScroll = $(this).scrollTop();
  $('.logo').css({'transform' : 'translate(0px, '+ wScroll /2 +'%)'});
  $('.back-bird').css({'transform' : 'translate(0px, '+ wScroll /4 +'%)'});
  $('.fore-bird').css({'transform' : 'translate(0px, '+ wScroll /14 +'%)'});
    
  if(wScroll > $('.clothes-pics').offset().top - ($(window).height() / 1.2)) {
    $('.clothes-pics figure').each(function(i){
      setTimeout(function(){
        $('.clothes-pics figure').eq(i).addClass('is-showing');
      }, 150 * (i+1));
    });
  };
    
  if(wScroll > $('.large-window').offset().top - $(window).height()){
    $('.large-window').css({'background-position':'center '+ (-wScroll / 35) +'px'});
    var opacity1 = (wScroll - $('.large-window').offset().top + 400) / (wScroll / 6);
    var opacity2 = (wScroll - $('.large-window').offset().top + 400 - 640) / (wScroll / 6);
    $('.window-tint.periscope-1').css({'opacity': opacity1});
    $('.window-tint.periscope-2').css({'opacity': opacity2});
  };
    
  if(wScroll > $('.blog-posts').offset().top - $(window).height()){
    var offset = Math.min(0, wScroll - $('.blog-posts').offset().top +$(window).height() - 500);
    $('.post-1').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.3) +'px)'});
    $('.post-2').css({'transform': 'translate(0px, '+ Math.abs(offset * 0.3) +'px)'});
    $('.post-3').css({'transform': 'translate('+ Math.abs(offset) +'px, '+ Math.abs(offset * 0.3) +'px)'});
  };
    
  if(wScroll > $('.blog-posts').offset().top - $(window).height()){
    var offset = Math.min(0, wScroll - $('.blog-posts').offset().top +$(window).height() - 800);
    $('.post-4').css({'transform': 'translate(0px, '+ Math.abs(offset * 0.3) +'px)'});
  };
});*/



// @codekit-prepend "flexslider.js";
// @codekit-prepend "superfish.js";
// @codekit-prepend "hoverIntent.js";
// @codekit-prepend "modernizer.js";
// @codekit-prepend "meanmenu.js";


(function ($) {


jQuery(document).ready(function () {
    jQuery('nav#mobile-nav').meanmenu();
});

$(window).load(function() {
  $('.sponsors').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 210,
    itemMargin: 5,
    minItems: 2,
    maxItems: 6
  });

});


$('.submenu-children li a').prepend('<i class="icon-angle-right"></i>');

$("#main-content table").addClass("table table-striped");


$(window).load(function() {

    $('.flexslider').flexslider({
    	 controlNav: false
    });


  $(document).ready(function(){
    $('.sf-menu').superfish();


    $('.rtw_main').addClass('ellipsis');

  });

  });

})(jQuery);
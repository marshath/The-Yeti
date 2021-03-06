// @codekit-prepend "flexslider.js";
// @codekit-prepend "superfish.js";
// @codekit-prepend "hoverIntent.js";
// @codekit-prepend "modernizer.js";
// @codekit-prepend "meanmenu.js";

jQuery(function () {
  jQuery('nav#mobile-nav').meanmenu();
  jQuery('.submenu-children li a').prepend('<i class="icon-angle-right"></i>');
  jQuery("#main-content table").addClass("table table-striped");
  jQuery('.sf-menu').superfish();
  jQuery('.rtw_main').addClass('ellipsis');
});

jQuery(window).load(function() {
  jQuery('.sponsors').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 210,
    itemMargin: 5,
    minItems: 2,
    maxItems: 6
  });
  jQuery('.flexslider').flexslider({
   controlNav: false
  });
});

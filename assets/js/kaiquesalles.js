 jQuery(document).ready(function(){ 
  jQuery().fancybox({
    selector : '[data-fancybox="toaqui"]',
    loop     : true,
    protect: true,
    buttons : [
      'zoom',
      'thumbs',
      'close'
    ],
    smallBtn   : true,
  });

  var $grid = jQuery('.portfolio-items').isotope({
    // options
  });
  // filter items on button click
  jQuery('#portfolio .cat li ol li a').click(function() {
    var filterValue = jQuery(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });

});

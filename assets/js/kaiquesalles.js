 jQuery(document).ready(function(){
  var $grid = jQuery('.portfolio-items').isotope({
    // options
  });
  // filter items on button click
  jQuery('#portfolio .cat li ol li a').click(function() {
    var filterValue = jQuery(this).attr('data-filter');
    //console.log(filterValue);
    if(filterValue == '*'){
      jQuery('#portfolio .portfolio-items .portfolio-sub-item').css('display', 'none');
    }
    $grid.isotope({ filter: filterValue });
  });

  jQuery('#portfolio .portfolio-items .portfolio-item').click(function(){
      jQuery('#portfolio .portfolio-items .portfolio-sub-item').css('display', 'block');
      var filterport = jQuery(this).attr('data-filter');
      $grid.isotope({ filter: filterport });
  });

});

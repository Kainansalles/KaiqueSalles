<?php

$paginas = render_post_type('page');

if($paginas->have_posts()) :
  $count = 0;
  while ($paginas->have_posts()) : $paginas->the_post();
    if ($paginas->posts[$count]->post_name == "sobre") :
     ?>
<div id="<?= render_menu()[0]->post_name ?>">
  <div class="container">
    <div class="section-title text-center center">
      <h2><?= $paginas->posts[$count]->post_title; ?></h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-4"> <?php the_post_thumbnail("shop_thumbnail", array("class" => "img-responsive")) ?></div>
      <div class="col-md-4">
        <div class="sobre-text">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sobre-text">
          <p><?php echo get_post_meta($paginas->posts[$count]->ID, 'page', true)['textarea']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    endif;
    $count ++;
  endwhile;
endif;
 ?>
<?php
  $servicos = render_post_type('post_servicos');
?>

<div id="servicos" style="background-image:url(<?php echo wp_get_attachment_url(get_theme_mod('set_servicos')); ?>);" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Serviços</h2>
      <hr>
    </div>
    <div class="space"></div>
    <div class="row">
      <?php
        if($servicos->have_posts()) :
            while ($servicos->have_posts()) : $servicos->the_post();
      ?>
      <div class="col-md-3 col-sm-6">
        <div class="service">
          <?php the_post_thumbnail(array(150,150));?>
          <h3><?php the_title(); ?></h3>
          <?php the_content();?>
        </div>
      </div>
      <?php
        endwhile;
      endif;
       ?>

    </div>
  </div>
</div>
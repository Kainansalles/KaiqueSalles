<?php get_header();
  render_menu();
?>

<div id="intro" style="background-image: url(<?= get_header_image(); ?>);">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1><?= bloginfo('name'); ?></h1>
          <!-- <span class="brand-heading">Modus</span> -->
          <div class="intro-text"><?= bloginfo('description'); ?></div>
          <a href="#portfolio" class="btn btn-default page-scroll">Ver Portifólio</a></div>
      </div>
    </div>
  </div>
</div>

<!-- sobre Section -->

<?php get_template_part('templates-parts/content', 'sobre'); ?>

 
<!-- Services Section -->

<?php get_template_part('templates-parts/content', 'servicos'); ?>


<!-- Portfolio Section -->

<?php get_template_part('templates-parts/content', 'portfolio'); ?>

<!-- Contact Section -->

<?php 
$paginas = render_post_type('page');
if($paginas->have_posts()) :
  $count = 0;
  while ($paginas->have_posts()) : $paginas->the_post();
    if ($paginas->posts[$count]->post_name == "contato") :
     ?>
   
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2><?= $paginas->posts[$count]->post_title; ?></h2>
      <hr>
      <p>Precisa de um orçamento?</p>
    </div>
    <?php the_content(); ?> 
    
      <!--<div class="col-md-8 col-md-offset-2">
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-map-marker fa-2x"></i>
          <p>4321 California St,<br>
            San Francisco, CA 12345</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-envelope-o fa-2x"></i>
          <p>info@company.com</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-phone fa-2x"></i>
          <p> +1 123 456 1234<br>
            +1 321 456 1234</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div> 

    <div class="col-md-8 col-md-offset-2">
      <h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>
      </form>
      -->
      <div class="social">
        <h3>Redes Sociais</h3>
        <ul>
        <?php 
        $social_name = 'meu_menu_social';
        $locations_social = get_nav_menu_locations();
        $menu_id_social = $locations_social[ $social_name ] ;
        $menu_social = wp_get_nav_menu_items(wp_get_nav_menu_object($menu_id_social)->name);

        if (has_nav_menu( 'meu_menu_social' )) : ?>
          <?php foreach ($menu_social as $menu): ?>
              <li><a href="<?= $menu->url; ?>"><i class="fa fa-<?= strtolower($menu->post_name); ?>"></i></a></li>              
          <?php endforeach ?>              
        <?php endif; ?>  
        </ul>
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
<?php get_footer(); ?>

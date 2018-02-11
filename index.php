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
          <a href="#sobre" class="btn btn-default page-scroll">Conheça mais</a></div>
      </div>
    </div>
  </div>
</div>

<!-- sobre Section -->

<?php get_template_part('templates-parts/content', 'sobre'); ?>

 
<!-- Services Section -->

<?php get_template_part('templates-parts/content', 'servicos'); ?>


<!-- Portfolio Section -->
<div id="portfolio">
  <div class="container"> <!-- Container -->
    <div class="section-title text-center center">
      <?php $paginas = render_post_type('page');

      if($paginas->have_posts()) :
        $count = 0;
        while ($paginas->have_posts()) : $paginas->the_post();
          if ($paginas->posts[$count]->post_name == "portfolio") :
      ?>
      <h2><?= $paginas->posts[$count]->post_title; ?></h2>
      <hr>
      <div class="clearfix"></div>
      <?php the_content(); ?>
    </div>
    <?php
        endif;
        $count ++;
      endwhile;
    endif;
     ?>
     <?php 
        $terms = get_terms( 'ks_potfolio', array(
         'orderby'    => 'name',
         'hide_empty' => true,
     ));

     ?>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a data-filter="*" class="active cat-todos">Todos</a></li>
            <?php 
            foreach ($terms as $term) : ?>
              <li><a data-filter=".<?= $term->slug ?>"><?= $term->name?></a></li>
            <? endforeach; ?>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <?php $portfolio = render_post_type('post_portfolio');        
        if($portfolio->have_posts()) :
          $count = 0;
            while ($portfolio->have_posts()) : $portfolio->the_post(); 
              $downloads = get_post_meta($post->ID, 'post_portfolio', true)['url'];
              $categorias = get_custom_category( $post->ID, 'ks_potfolio'); 
              $port_filtro = $portfolio->posts[$count]->post_name;?>

        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 <?= $categorias ?>" >
          <div class="portfolio-item" data-filter=".<?= $port_filtro;?>">
            <div class="hover-bg">                
              <div class="hover-text">
                <h4><?= the_title();?></h4>
                <p><?= the_content();?></p>
              </div>
              <img src="<?= get_the_post_thumbnail_url(); ?>" class="img-responsive img-thumbnail" alt="<?= the_title();?>"> 
            </div>
          </div>
        </div>

        <div style="display: none;" class="col-xs-6 col-sm-6 col-md-3 col-lg-3 <?= $port_filtro;?>">
          <div class="portfolio-sub-item">
            <div class="hover-bg">
                <!-- <a data-fancybox="toaqui" data-caption="Aqui pode vir um texto" href="http://localhost/kaiquesalles.com.br/wp-content/uploads/2018/01/intro-bg.jpg" title="Project description" rel="prettyPhoto"></a> -->
                <img src="<?= $downloads[0]; ?>" class="img-responsive img-thumbnail"> 
            </div>
          </div>
        </div>

          <?php
          $count ++;
            endwhile;
            endif;
          ?>
      </div>
    </div>
  </div>
</div>


<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact us</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diamcommodo nibh ante facilisis.</p>
    </div>
    <div class="col-md-8 col-md-offset-2">
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
      <div class="social">
        <h3>Follow us</h3>
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#"><i class="fa fa-github"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>

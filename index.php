<?php get_header();
$menu = 'meu_menu_principal';
$locations_menu = get_nav_menu_locations();
$menu_id = $locations_menu[ $menu ] ;
$menu = wp_get_nav_menu_items(wp_get_nav_menu_object($menu_id)->name);

$args = array(
    'post_type'      => 'page'
  );
$paginas = new WP_Query($args);

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
<?php
if($paginas->have_posts()) :
  $count = 0;
  while ($paginas->have_posts()) : $paginas->the_post();
    if ($paginas->posts[$count]->post_title == "Sobre") :
     ?>
<div id="<?= $menu[0]->post_name ?>">
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

 <?php
  $args = array(
      'post_type'      => 'post_servicos',
      'posts_per_page' => -1
    );
  $servicos = new WP_Query($args);

  ?>

<!-- Services Section -->
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
<!-- Portfolio Section -->
<div id="works">
  <div class="container"> <!-- Container -->
    <div class="section-title text-center center">
      <h2>Our Portfolio</h2>
      <hr>
      <div class="clearfix"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diamcommodo nibh ante facilisis.</p>
    </div>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">All</a></li>
            <li><a href="#" data-filter=".lorem">Web Design</a></li>
            <li><a href="#" data-filter=".consectetur">Web Development</a></li>
            <li><a href="#" data-filter=".dapibus">Branding</a></li>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 lorem">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/01.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Design</p>
              </div>
              <img src="img/portfolio/01.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 consectetur">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/02.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Development</p>
              </div>
              <img src="img/portfolio/02.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 lorem">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/03.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Design</p>
              </div>
              <img src="img/portfolio/03.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 lorem">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/04.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Design</p>
              </div>
              <img src="img/portfolio/04.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 consectetur">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/05.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Development</p>
              </div>
              <img src="img/portfolio/05.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 dapibus">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/06.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Branding</p>
              </div>
              <img src="img/portfolio/06.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 dapibus consectetur">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/07.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Development, Branding</p>
              </div>
              <img src="img/portfolio/07.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 lorem">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/08.jpg" title="Project description" rel="prettyPhoto">
              <div class="hover-text">
                <h4>Project Title</h4>
                <p>Web Design</p>
              </div>
              <img src="img/portfolio/08.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
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

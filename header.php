<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
</head>
<body <?php body_class(); ?> id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="preloader">
  <div id="status"> <img src="<?= get_template_directory_uri()?>/assets/img/preloader.gif" height="64" width="64" alt="">
  </div>
</div>
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="#page-top"> 
        <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>                 
        <img src="<?= $image[0];?>" class="custom-logo" height="48px;" width="51px;"/>
      </a> 
    </div>

    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="hidden"> <a href="#page-top"></a> </li>
        <?php
          foreach (render_menu() as $key) {?>
            <li> <a class="page-scroll" href="<?= $key->url?>"><?= $key->title?></a> </li>
          <?php
          }
          ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
<!-- Header -->
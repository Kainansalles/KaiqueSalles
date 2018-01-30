<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--<meta name="description" content="">
<meta name="author" content="">-->

<!-- Bootstrap -->
<!-- <link rel="stylesheet" type="text/css"  href="css/bootstrap.css"> -->
<!--<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">-->

<!-- Stylesheet
    ================================================== -->
<!--
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<!--
<script type="text/javascript" src="js/modernizr.custom.js"></script>
-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?> id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="preloader">
  <div id="status"> <img src="<?= get_template_directory_uri(); ?> /assets/img/preloader.gif " height="64" width="64" alt=""> </div>
</div>
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="#page-top"> <i class="fa fa-paper-plane-o"></i> Modus</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <!-- Hidden li included to remove active class from sobre link when scrolled up past sobre section -->
        <li class="hidden"> <a href="#page-top"></a> </li>
        <?php
          $menu = 'meu_menu_principal';
          $locations_menu = get_nav_menu_locations();
          $menu_id = $locations_menu[ $menu ] ;
          $menu = wp_get_nav_menu_items(wp_get_nav_menu_object($menu_id)->name);

          foreach ($menu as $key) {?>
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

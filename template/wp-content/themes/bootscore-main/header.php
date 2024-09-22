<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php wp_head(); ;;?>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <style>
  #response {
    display: none; /* Esconde a div por padrão */
  }
 </style>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open();?>

<div id="page" class="site">
  <a class="skip-link visually-hidden-focusable" href="#primary"><?php esc_html_e( 'Skip to content', 'bootscore' ); ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid"> <!-- Use container-fluid para ocupar toda a largura -->
    <a class="navbar-brand" href="http://localhost:8085/">
      <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/coc_fiocruz_colorida.png?raw=true" style="width:200px">
    </a>

    <!-- Menu Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> <!-- Use justify-content-end -->
      <?php
      wp_nav_menu( array(
          'theme_location'    => 'principal',
          'depth'             => 2,
          'container'         => false,
          'menu_class'        => 'navbar-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
      ) );
      ?>
    </div>
  </div>
</nav>

<a class="navbar-brand" href="<?= esc_url(home_url()); ?>">
    <img src="https://github.com/abraao69/testinho-fiocruz-wp-bootstrap/blob/main/Fachada.jpg?raw=true" style="width:100%; height:600px;">
  </a>
  <header id="masthead" class="<?= apply_filters('bootscore/class/header', 'sticky-top bg-body-tertiary site-header'); ?>">
    <div id="page" class="site">
      <a class="skip-link visually-hidden-focusable" href="#primary"><?php esc_html_e('Skip to content', 'bootscore'); ?></a>

      <!-- Top Bar Widget -->
      <?php if (is_active_sidebar('top-bar')) : ?>
        <?php dynamic_sidebar('top-bar'); ?>
      <?php endif; ?>
      

     <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar">
          <div class="offcanvas-header">
           
          </div>
          <div class="offcanvas-body">
            <!-- Bootstrap 5 Nav Walker Main Menu -->
            <?php get_template_part('template-parts/header/main-menu'); ?>

            <!-- Top Nav 2 Widget -->
            <?php if (is_active_sidebar('top-nav-2')) : ?>
              <?php dynamic_sidebar('top-nav-2'); ?>
            <?php endif; ?>

          </div>
        </div>

        <div class="header-actions d-flex align-items-center">

        </div><!-- .header-actions -->

      </div><!-- .container -->

    </nav><!-- .navbar -->

   

  </header><!-- #masthead -->

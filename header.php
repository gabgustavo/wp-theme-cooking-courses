<!doctype html>
<html lang="<?php language_attributes(); ?> ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<header class="header py-5">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-8 col-md-4 mb-4 mb-md-0">
        <a href="<?= esc_url(home_url('/'));?>">
          <?php
          $opciones = get_option('cocina_theme_options');
          $logo = (isset($opciones['logotipo']))
          ? $opciones['logotipo']
          : get_template_directory_uri().'/images/logo.png';
          ?>
          <img src="<?= $logo; ?>" class="img-fluid" alt="<?=bloginfo( 'name' )?>">
        </a>
      </div>
      <div class="col-md-8">
        <nav class="navbar navbar-expand-md navbar-light justify-content-center">
          <button class="navbar-toggler mb-4" data-toggle="collapse"
                  data-target=".nav_principal" aria-expanded="false" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php
          $args = array(
            'menu'=>'menu_principal',
            'theme_location' => 'menu_principal',
            'container' => 'div',
            'depth' => 3,
            'container_class' => 'nav_principal collapse navbar-collapse justify-content-center'.
              'justify-content-lg-end text-center text-uppercase',
            'menu_class' => 'navbar-nav mr-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          );
          wp_nav_menu($args);
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>
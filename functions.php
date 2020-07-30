<?php
function escuela_modeda($value) {
  $valor = str_replace([',00', '.'],'', $value);
  return number_format($valor, 0, ',', '.');
}

//Agregar widgets
include(get_template_directory(). '/inc/widgets.php');
//Clase para poder integrar menus de varios niveles a wp
include(get_template_directory(). '/class-wp-bootstrap-navwalker.php');
//
require_once get_template_directory() . '/lib/TGM-Plugin/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/require-plugins.php';
//integrar CMB2
//con la siguiente linea se muestran todos los campos disponibles
//include(get_template_directory(). '/CMB2-functions.php');
//custom fields
include(get_template_directory(). '/inc/custom-fields.php');
//agregar los postypes
include(get_template_directory(). '/inc/posttypes.php');
//queries reutilizables
include(get_template_directory(). '/inc/queries.php');
//opciones del tema
include(get_template_directory(). '/inc/opciones.php');





//imagenes detacadas
function cocina_image_detacada($id)
{
  $imagen = get_the_post_thumbnail_url($id, 'full');
  $html = '';
  $conImg = false;
  if($imagen) {
    $conImg = true;
    $html = '<div class="row">
      <div class="col-12 imagen-destacada" style="background-image: url('.$imagen.')"></div>
    </div>';

    //Crear scripts virtuales
    /*wp_register_style('custom_styles', 0);
    wp_enqueue_style('custom_styles');
    $imagen_destacada_css = "
    .alguna-clase {
        background-image: url({$imagen});
      }
    ";
    wp_add_inline_style('custom_styles', $imagen_destacada_css);*/
  }


  //return ['html' => $html, 'img' => $conImg];
  return $html;
}
add_action('init', 'cocina_image_detacada');

//funciones que se cargan al activar el tema
function cocina_setup()
{
  //definir tamaños de las imagenes
  add_image_size('mediana', 510, 340, 1);
  add_image_size('cuadrada_mediana', 350, 350, 1);
  //imagen destacada
  add_theme_support('post-thumbnails');
  //habilitar los titulos en el tema
  add_theme_support('title-tag');
  //menu de navegacion
  register_nav_menus([
    'menu_principal' => __(esc_html('Menú princial', 'cocina')),
    'menu_pie_pagina' => __(esc_html('Menú de pie de página', 'cocina'))
  ]);
}
add_action('after_setup_theme', 'cocina_setup');

//agregar clases enlace a
function cocina_enlace_clases($atts, $item, $args)
{
  if($args->theme_location == 'menu_principal' || $args->theme_location == 'menu_pie_pagina') {
    $atts['class'] = 'nav-link';
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'cocina_enlace_clases', 10, 3);//primer numero tiempo (defaul), segundo los argumentos
//estilos al li
function cocina_additional_class_on_li($classes, $item, $args) {
    $classes['class'] = 'nav-item ';
  return $classes;
}
add_filter('nav_menu_css_class', 'cocina_additional_class_on_li', 1, 3);

function cocina_special_nav_class( $classes, $item ) {
  if ( $item->url == '#' ||  $item->url == 'javascript:void(0);') {
    //$item->ID
    $classes[] = "dropdown main-submenu";
  }
  return $classes;
}
add_filter( 'nav_menu_css_class' , 'cocina_special_nav_class' , 10, 2 );


//carga de scripts y css del theme
function cocina_scripts()
{
  //styles
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', false, '4.2');
  wp_enqueue_style('styles', get_stylesheet_uri(), ['bootstrap-css'], '1.0');

  //scripts
  wp_enqueue_script('scjquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js',  false, '2.2.4', 0);
  wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js',  false, '4.0', true);
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', ['popper'], '4.2', true);
  wp_enqueue_script('scripts-dev', get_template_directory_uri() . '/js/scripts.js', ['bootstrap-js'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'cocina_scripts');

//agregar un mensaje a la pagina del admin
function escuela_cambiar_estado($states, $post)
{
  if((get_post_type($post->ID == 'page')) &&  (get_page_template_slug($post->ID) == 'page-clases.php')) {
    $states[] = __('Página de cursos — <a href="edit.php?post_type=clases-cocina">Administrar</a>');
  }
  return $states;
}
add_filter('display_post_states','escuela_cambiar_estado', 10, 2);


//soporte para widgets
function cocina_widgets_sidebar()
{
  register_sidebar([
   'name' => 'Widget lateral',
    'id' => 'sidebar_widget',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="text-center text-light separador inverso">',
    'after_title' => '</h2>'
  ]);
}
add_action('widgets_init', 'cocina_widgets_sidebar');



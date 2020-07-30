<?php
add_action( 'cmb2_admin_init', 'cocina_options_theme' );
function cocina_options_theme() {

  /**
   * Registers options page menu item and form.
   */
  $cmb_options = new_cmb2_box( array(
    'id'           => 'cocina_theme_options',
    'title'        => esc_html__( 'Escuela de cocina ajustes', 'cocina' ),
    'object_types' => array( 'options-page' ),

    /*
     * The following parameters are specific to the options-page box
     * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
     */

    'option_key'      => 'cocina_theme_options', // The option key and admin menu page slug.
    'icon_url'        => 'dashicons-hammer', // Menu icon. Only applicable if 'parent_slug' is left empty.
  ) );

  /**
   * Options fields ids only need
   * to be unique within this box.
   * Prefix is not needed.
   */

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Color del sitio primario', 'cocina' ),
    'desc'    => esc_html__( 'Añada un color primario para el sitio web (enlaces, botones, textos)', 'cocina' ),
    'id'      => 'bg_primary',
    'type'    => 'colorpicker',
    'default' => '#f46669',
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Color del sitio secundario', 'cocina' ),
    'desc'    => esc_html__( 'Añada un color secundario para el sitio web (enlaces, botones, textos)', 'cocina' ),
    'id'      => 'bg_secundary',
    'type'    => 'colorpicker',
    'default' => '#c7c57d',
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Número de clases a mostrar en el home', 'cocina' ),
    'desc'    => esc_html__( 'Añada el numero de clases que desea ver en el home', 'cocina' ),
    'id'      => 'num_clases',
    'type'    => 'text',
    'default' => 3,
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Logotipo', 'cocina' ),
    'desc'    => esc_html__( 'Cargue una imagen para el logo', 'cocina' ),
    'id'      => 'logotipo',
    'type'    => 'file',
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Separador', 'cocina' ),
    'desc'    => esc_html__( 'Carga una imagen para el separador', 'cocina' ),
    'id'      => 'separador',
    'type'    => 'file',
  ) );

}

function cocina_estilos_thema()
{
  $opciones = get_option('cocina_theme_options');
  $color_primary = (isset($opciones['bg_primary'])) ? $opciones['bg_primary'] : '';
  $color_secundary = (isset($opciones['bg_secundary'])) ? $opciones['bg_secundary'] : '';
  $separador = (isset($opciones['separador']))
    ? $opciones['separador']
    : get_template_directory_uri().'/images/separador_alternativo.png';

  wp_register_style('custom-opciones', false);
  wp_enqueue_style('custom-opciones');
  $custom_css = "
          /** Bg color primario **/
          .btn-primary,
          .bg-primary,
          .alert-primary,
          .list-group-item-primary,
          .comment-respond .submit {
               background-color: {$color_primary}!important;
          }
          /** Color primario **/
          .card-subtitle,
          .nav-link:hover,
          .current_page_item .nav-link ,
          .contenido-entrada .meta span,
          .entrada a ,
          .instructor,
          .comment-respond a,
          .comentarios-cerrados {
               color:  {$color_primary}!important;
          }
          /** border   primario **/
          .current_page_item .nav-link,
          blockquote.subtitulo,
          .btn-primary,
          .footer  {
               border-color:  {$color_primary}!important;
          }
          aside .card-meta,
          .badge-secondary,
          .bg-secondary,
          .alert-secondary,
          .list-group-item-secondary,
          aside .card-footer,
          .comment-body,
          .page-link:hover   {
               background-color: {$color_secundary} !important;
          }
          .page-link {
               color: {$color_secundary} !important;
          }
          /*** Separador **/
          .separador::after {
               background-image: url( {$separador} )!important;
          }
     ";
  if($color_primary && $color_secundary)
    wp_add_inline_style('custom-opciones', $custom_css);
}
add_action('wp_footer', 'cocina_estilos_thema');
<?php
//CMB
if ( file_exists( dirname(dirname( __FILE__ )) . '/CMB2/init.php' ) ) {
  require_once dirname( dirname( __FILE__ )) . '/CMB2/init.php';
} elseif ( file_exists( dirname(dirname( __FILE__ )) . '/CMB2/init.php' ) ) {
  require_once dirname(dirname( __FILE__ )) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cocina_campos_homepage' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cocina_campos_homepage()
{
  $id_home = get_option('page_on_front');

  /**
   * Metabox to be displayed on a single page ID
   */
  $cocina_camps_homePage = new_cmb2_box(array(
    'id' => 'cocina_homepage',
    'title' => esc_html__('Campos Homepage', 'cocina'),
    'object_types' => array('page'), // Post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'show_on' => array(
      'id' => array($id_home),
    ), // Specific post IDs to display this metabox
  ));

  $cocina_camps_homePage->add_field( array(
    'name'    => esc_html__( 'Texto superior 1', 'cocina' ),
    'desc'    => esc_html__( 'Texto para la parte superior para el sitio web', 'cocina' ),
    'id'      => 'texto_superior_1',
    'type'    => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 5,
    ),
  ) );

  $cocina_camps_homePage->add_field( array(
    'name' => esc_html__( 'Imagen Hero 1', 'cocina' ),
    'desc' => esc_html__( 'Primera imagen para la parte superior', 'cocina' ),
    'id'   => 'imagen_superior_1',
    'type' => 'file',
  ) );

  $cocina_camps_homePage->add_field( array(
    'name'    => esc_html__( 'Texto superior 2', 'cocina' ),
    'desc'    => esc_html__( 'Texto para la parte superior para el sitio web', 'cocina' ),
    'id'      => 'texto_superior_2',
    'type'    => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 5,
    ),
  ) );

  $cocina_camps_homePage->add_field( array(
    'name' => esc_html__( 'Imagen Hero 2', 'cocina' ),
    'desc' => esc_html__( 'Segunda imagen para la parte superior', 'cocina' ),
    'id'   => 'imagen_superior_2',
    'type' => 'file',
  ) );

  //campos de licenciatura
  $cocina_camps_homePage->add_field( array(
    'name'    => esc_html__( 'Texto licenciatura', 'cocina' ),
    'desc'    => esc_html__( 'Añada el texto para la licenciatura', 'cocina' ),
    'id'      => 'texto_licenciatura',
    'type'    => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 5,
    ),
  ) );

  $cocina_camps_homePage->add_field( array(
    'name' => esc_html__( 'Imagen fondo licenciatura', 'cocina' ),
    'desc' => esc_html__( 'Imagen de fondo para la sección licenciatura', 'cocina' ),
    'id'   => 'imagen_licenciatura',
    'type' => 'file',
  ) );
}

//--------------------------------
add_action( 'cmb2_admin_init', 'cocina_seccion_nosotros' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function cocina_seccion_nosotros() {

  /**
   * Repeatable Field Groups
   */
  $cocina_iconos = new_cmb2_box( array(
    'id'           => 'cocina_group_metabox',
    'title'        => esc_html__( 'Iconos con descripción', 'cocina' ),
    'object_types' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => 'true',
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-iconos.php'
    ]
  ) );

  $cocina_iconos->add_field( array(
    'name' => esc_html__( 'Título de la sección', 'cocina' ),
    'desc' => esc_html__( 'Añada un titulo para la sección', 'cocina' ),
    'id'   => 'titulo_iconos',
    'type' => 'text',
  ) );

  // $group_field_id is the field id string, so in this case: 'cocina_group_demo'
  $group_field_id = $cocina_iconos->add_field( array(
    'id'          => 'cocina_nosotros',
    'type'        => 'group',
    'description' => esc_html__( 'Agregue opciones según sea necesario', 'cocina' ),
    'options'     => array(
      'group_title'    => esc_html__( 'Característica {#}', 'cocina' ), // {#} gets replaced by row number
      'add_button'     => esc_html__( 'Agregar otro grupo', 'cocina' ),
      'remove_button'  => esc_html__( 'Elimnar', 'cocina' ),
      'sortable'       => true,
      // 'closed'      => true, // true to have the groups closed by default
      'remove_confirm' => esc_html__( 'Esta seguro de querer eliminar esta característica?', 'cocina' ), // Performs confirmation before removing group.
    ),
  ) );

  $cocina_iconos->add_group_field( $group_field_id, array(
    'name'       => esc_html__( 'Titulo', 'cocina' ),
    'id'         => 'titulo_icono',
    'type'       => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
  ) );

  $cocina_iconos->add_group_field( $group_field_id, array(
    'name'        => esc_html__( 'Description', 'cocina' ),
    'description' => esc_html__( 'Agregue una descripción a esta característica', 'cocina' ),
    'id'          => 'desc_icono',
    'type'        => 'textarea_small',
  ) );

  $cocina_iconos->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Icono', 'cocina' ),
    'id'   => 'imagen_icono',
    'type' => 'file',
  ) );

}

//---------------------------------
//blog
add_action( 'cmb2_admin_init', 'cocina_campos_camposblog' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cocina_campos_camposblog()
{
  $id_blog = get_option('page_for_posts');

  $cocina_camps_blogPage = new_cmb2_box(array(
    'id' => 'cocina_blog',
    'title' => esc_html__('Campos del blog', 'cocina'),
    'object_types' => array('page'), // Post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'show_on' => array(
      'id' => array($id_blog),
    ), // Specific post IDs to display this metabox
  ));

  $cocina_camps_blogPage->add_field( array(
    'name' => esc_html__( 'Slogan blog', 'cocina' ),
    'desc' => esc_html__( 'Añada una descripción a la pagina web', 'cocina' ),
    'id'   => 'slogan_blog',
    'type' => 'text',
  ) );
}
//--------------------------------------

//post type de clases
add_action( 'cmb2_admin_init', 'cocina_campos_clases' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function cocina_campos_clases()
{

  /**
   * Repeatable Field Groups
   */
  $cocina_classes = new_cmb2_box(array(
    'id' => 'cocina_cursos_metabox',
    'title' => esc_html__('Información de clases y cursos', 'cocina'),
    'object_types' => array('clases-cocina'),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => 'true'));

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Subtitulo del curso', 'cocina' ),
    'desc' => esc_html__( 'Añada un subtitulo para el curso', 'cocina' ),
    'id'   => 'curso_subtitulo',
    'type' => 'text',
  ) );
  //añadir titulos de secciones
  $cocina_classes->add_field( array(
    'name'     => esc_html__( 'Información sobre la fecha y horario del curso', 'cocina' ),
    'desc'     => esc_html__( 'Añada informcación relacionada a fecha, días y horas del curso', 'cocina' ),
    'id'       => 'curso_info',
    'type'     => 'title',
    'on_front' => false,
  ) );
  //horas y dias
  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Indicaciones de los días', 'cocina' ),
    'desc' => esc_html__( 'Añada las indicaciones  de los días Ej: todos los sábados', 'cocina' ),
    'id'   => 'curso_indicaciones',
    'type' => 'text',
  ) );
  //campos de fechas y horas
  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Fecha de inicio del curso', 'cocina' ),
    'desc' => esc_html__( 'Añada la fecha de incio del curso', 'cocina' ),
    'id'   => 'curso_fecha_inicio',
    'type' => 'text_date',
    'date_format' => 'd-m-Y',
    'column' => true,
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Fecha de fin del curso', 'cocina' ),
    'desc' => esc_html__( 'Añada la fecha de fin del curso', 'cocina' ),
    'id'   => 'curso_fecha_fin',
    'type' => 'text_date',
     'date_format' => 'd-m-Y',
    'column' => true,
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Hora de inicio de clase', 'cocina' ),
    'desc' => esc_html__( 'Añada hora', 'cocina' ),
    'id'   => 'curso_hora_inicio_clase',
    'type' => 'text_time',
    'column' => true,
    //'time_format' => 'H:i', // Set to 24hr format
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Hora de fin de clase', 'cocina' ),
    'desc' => esc_html__( 'Añada hora', 'cocina' ),
    'id'   => 'curso_hora_fin_clase',
    'type' => 'text_time',
    //'time_format' => 'H:i', // Set to 24hr format
  ) );


  //añadir titulos de secciones
  $cocina_classes->add_field( array(
    'name'     => esc_html__( 'Información estra del curso', 'cocina' ),
    'desc'     => esc_html__( 'Añada cupo, precio, instructor en esta sección', 'cocina' ),
    'id'       => 'curso_info_extra',
    'type'     => 'title',
    'on_front' => false,
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Precio del curso', 'cocina' ),
    'desc' => esc_html__( 'Añada el costo del curso', 'cocina' ),
    'id'   => 'cocina_costo',
    'type' => 'text_money',
    'column' => true,
    // 'before_field' => '£', // override '$' symbol if needed
    // 'repeatable' => true,
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Cupo', 'cocina' ),
    'desc' => esc_html__( 'Cupo para el curso', 'cocina' ),
    'id'   => 'curso_cupo',
    'type' => 'text',
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Que incluye el curso', 'cocina' ),
    'desc' => esc_html__( 'Añada lo que incluye el curso (1 por línea)', 'cocina' ),
    'id'   => 'curso_incluye',
    'type' => 'text',
    'repeatable' => true,
  ) );

  $cocina_classes->add_field( array(
    'name' => esc_html__( 'Instructor del curso', 'cocina' ),
    'desc' => esc_html__( 'Seleccione el chef que impatirá el curso', 'cocina' ),
    'id'   => 'curso_chefs',
    'limit' => 10,
    'type' => 'post_search_ajax',
    'query_args'	=> array(
      'post_type'			=> array( 'chefs' ),
      'post_status'		=> array( 'publish' ),
      'posts_per_page'	=> -1
    )
  ) );

}

//---------------------------------
add_action( 'cmb2_admin_init', 'cocina_campos_galeria' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function cocina_campos_galeria()
{
  /**
   * Repeatable Field Groups
   */
  $cocina_galeria = new_cmb2_box(array(
    'id' => 'cocina_galeria_metabox',
    'title' => esc_html__('Galería de imágenes', 'cocina'),
    'object_types' => array('page'),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => 'true',
    'show_on' => array(
      'key' => 'page-template',
      'value' => 'page-galeria.php',
    ),
    ));

  $cocina_galeria->add_field( array(
    'name'         => esc_html__( 'Imágenes', 'cocina' ),
    'desc'         => esc_html__( 'Cargue las imágenes de la galería aquís', 'cocina' ),
    'id'           => 'cocina_imagenes_galeria',
    'type'         => 'file_list',
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

}
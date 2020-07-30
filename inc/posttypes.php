<?php
add_action( 'init', 'cocina_clases' );
function cocina_clases() {
  $labels = array(
    'name'               => _x( 'Clases de cocina', 'cocina' ),
    'singular_name'      => _x( 'Clase de cocina', 'post type singular name', 'cocina' ),
    'menu_name'          => _x( 'Clases de cocina', 'admin menu', 'cocina' ),
    'name_admin_bar'     => _x( 'Clases de cocina', 'add new on admin bar', 'cocina' ),
    'add_new'            => _x( 'Agregar nueva', 'book', 'cocina' ),
    'add_new_item'       => __( 'Nueva clase', 'cocina' ),
    'new_item'           => __( 'Nueva clase', 'cocina' ),
    'edit_item'          => __( 'Editar clase', 'cocina' ),
    'view_item'          => __( 'Ver clase', 'cocina' ),
    'all_items'          => __( 'Todas las clases', 'cocina' ),
    'search_items'       => __( 'Buscar clase', 'cocina' ),
    'parent_item_colon'  => __( 'clase padre:', 'cocina' ),
    'not_found'          => __( 'No se encontraron clases.', 'cocina' ),
    'not_found_in_trash' => __( 'No se encontraron clases en la papelera.', 'cocina' ),
    'feactured_image' => __( 'Imagen destacada' ),
    'set_feactured_image' => __( 'Agregar imagen destacada' ),
    'remove_feactured_image' => __( 'Eliminar imagen destacada' ),
    'use_feactured_image' => __( 'Usar imagen destacada' ),
    'archives' => __( 'Archivos de clase' ),
    'insert_into_item' => __( 'Insertar en clases' ),
    'uploaded_to_this_item' => __( 'Cargar en esta clase' ),
    'filter_items_list' => __( 'Filtrar lista de clases' ),
    'items_list_navigation' => __( 'Navegacion de clases de cocina' ),
    'items_list' => __( 'Lista de clases de cocona' ),
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'cocina' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'clases' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 6,
    'show_in_rest'      => true,
    'menu_icon'      => 'dashicons-welcome-learn-more  ',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
  );

  register_post_type( 'clases-cocina', $args );
}

/* Agrega el post type de Chefs Instructores */
function cocina_posttype_chefs_instructores() {
  $labels = array(
    'name'                  => _x( 'Chefs / Instructores', 'cocina' ),
    'singular_name'         => _x( 'Chef / Instructor',  'cocina' ),
    'menu_name'             => _x( 'Chefs / Instructores', 'Admin Menu text', 'cocina' ),
    'name_admin_bar'        => _x( 'Chefs / Instructores', 'Add New on Toolbar', 'cocina' ),
    'add_new'               => __( 'Agregar ', 'cocina' ),
    'add_new_item'          => __( 'Agregar nuevo chef', 'cocina' ),
    'new_item'              => __( 'Nueva chef', 'cocina' ),
    'edit_item'             => __( 'Editar chef', 'cocina' ),
    'view_item'             => __( 'Ver chef', 'cocina' ),
    'all_items'             => __( 'Todos los chef', 'cocina' ),
    'search_items'          => __( 'Buscar chefs / Instructores', 'cocina' ),
    'parent_item_colon'     => __( 'Padre chefs / Instructores:', 'cocina' ),
    'not_found'             => __( 'No se encontraron chefs.', 'cocina' ),
    'not_found_in_trash'    => __( 'No se encontrar chefs en la papelera', 'cocina' ),
    'featured_image'        => _x( 'Imagen destacada', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'cocina' ),
    'set_featured_image'    => _x( 'Agregar imagen destacada', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'cocina' ),
    'remove_featured_image' => _x( 'Borrar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'cocina' ),
    'use_featured_image'    => _x( 'Usar imagen destacada', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'cocina' ),
    'archives'              => _x( 'Archivo de chefs', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'cocina' ),
    'insert_into_item'      => _x( 'Insertar en chefs', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'cocina' ),
    'uploaded_to_this_item' => _x( 'Cargadas nn chefs', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'cocina' ),
    'filter_items_list'     => _x( 'Filtrar lista de chefs', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'cocina' ),
    'items_list_navigation' => _x( 'Chefs navegación', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'cocina' ),
    'items_list'            => _x( 'Chefs lista', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'cocina' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'chefs-instructores' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-admin-users',
    // true como paginas (pueden tener hijos), false como posts (no tienen hijos)
    'hierarchical'       => false,
    'menu_position'      => 7,
    'supports'           => array( 'title', 'editor',  'thumbnail' ),
    'show_in_rest'       => true,
    'rest_base'          => 'chefs-instructores'
  );

  register_post_type( 'chefs', $args );
}

add_action( 'init', 'cocina_posttype_chefs_instructores' );
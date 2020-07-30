<?php
//
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins()
{
  /*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
  $plugins = array(

    // This is an example of how to include a plugin bundled with a theme.
    array(
      'name'               => 'CMB2 Field Type - Post Search Ajax', // The plugin name.
      'slug'               => 'cmb2-field-post-search-ajax', // The plugin slug (typically the folder name).
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => 'https://github.com/alexis-magina/cmb2-field-post-search-ajax/archive/master.zip', // If set, overrides default API URL and points to an external URL.
    ),
  );

  $config = array(
    'id'           => 'cocina_cmb2-field-ajax',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => 'Este tema requiere del plugin CMB2 Field Type: Post Search Ajax,
     el enlace permite la descarga directa, una vez se descargue, se debe ir a: Plugins » Añadir nuevo » Subir plugin.
     <a href="plugin-install.php"> Cargar el archivo</a> - Información del plugin <a href="https://github.com/alexis-magina/cmb2-field-post-search-ajax" target="_blank"> Doc</a>. Al ser un plugin externo a WordPress se debe ocultar este mensaje.',                      // Message to output right before the plugins table.
    /*
    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
      'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
      // <snip>...</snip>
      'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    )
    */
  );

  tgmpa( $plugins, $config );
}
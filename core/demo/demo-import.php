<?php

function ocdi_import_files() {
    return [
      [
        'import_file_name'           => 'Demo Import 1',
        'categories'                 => [ 'Default' ],
        'import_file_url'            => get_template_directory_uri().'/core/demo/demo-1/content.xml',
        'import_widget_file_url'     => get_template_directory_uri().'/core/demo/demo-1/widgets.wie',
        'import_customizer_file_url' => get_template_directory_uri().'/core/demo/demo-1/customizer.dat',
        'import_preview_image_url'   => get_template_directory_uri().'/core/demo/demo-1/demo.png',
        'preview_url'                => 'http://adamargan.local/',
      ]
    ];
  }
add_filter( 'ocdi/import_files', 'ocdi_import_files' );


function ocdi_register_plugins( $plugins ) {
    $theme_plugins = [
      [ 
        'name'     => 'contact form7',
        'slug'     => 'contact-form-7', 
        'required' => true,                    
      ],
      [ 
        'name'     => 'elementor', 
        'slug'     => 'elementor', 
        'required' => true,                     
      ],
      [ 
        'name'     => 'mailchimp for wp', 
        'slug'     => 'mailchimp-for-wp', 
        'required' => true,                    
      ],
      [ 
        'name'     => 'translatepress multilingual', 
        'slug'     => 'translatepress-multilingual', 
        'required' => true,                     
      ],
      [ 
        'name'     => 'woocommerce', 
        'slug'     => 'woocommerce', 
        'required' => true,                    
      ],
      [ 
        'name'     => 'argan block',
        'slug'     => 'argan-block',         
        'source'   => get_template_directory_uri() . '/core/demo/demo-1/argan-block.zip',
        'required' => true,
      ]
    ];
   
    return array_merge( $plugins, $theme_plugins );
  }
  add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
  

  function ocdi_after_import_setup() {
    
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'header', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'footer', 'nav_menu' );
    $footer1_menu = get_term_by( 'name', 'footer 1', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', [
            'header' => $main_menu->term_id, 
            'footer' => $footer_menu->term_id, 
            'footer_1' => $footer1_menu->term_id, 
        ]
    );
    
    // Get the front page.
    $front_page = get_posts(
      [
        'post_type'              => 'page',
        'title'                  => 'Home',
        'post_status'            => 'all',
        'numberposts'            => 1,
      ]
    );
   
    if ( ! empty( $front_page ) ) {
      update_option( 'page_on_front', $front_page[0]->ID );
    }
   
    if ( ! empty( $blog_page ) || ! empty( $front_page ) ) {
      update_option( 'show_on_front', 'page' );
    }
  }
  add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );



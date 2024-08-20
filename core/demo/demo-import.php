<?php
/**
 * 
 * This is One Click Demo Impot Settings
 * 
 * @package Horizon
 */
function ocdi_import_files() {
    return [
      [
        'import_file_name'           => 'Demo Import 1',
        'categories'                 => [ 'Default' ],
        'import_file_url'            => get_template_directory_uri().'/core/demo/demo-1/content.xml',
        'import_widget_file_url'     => get_template_directory_uri().'/core/demo/demo-1/widgets.wie',
        'import_customizer_file_url' => get_template_directory_uri().'/core/demo/demo-1/customizer.dat',
        'import_preview_image_url'   => get_template_directory_uri().'/core/demo/demo-1/demo.png',
        'preview_url'                => 'http://oussamastore.local/',
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
        'name'     => 'translatepress multilingual', 
        'slug'     => 'translatepress-multilingual', 
        'required' => true,                     
      ],
      [ 
        'name'     => 'woocommerce', 
        'slug'     => 'woocommerce', 
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

    set_theme_mod( 'nav_menu_locations', [
            'header' => $main_menu->term_id, 
            'footer' => $footer_menu->term_id, 
        ]
    );
    
    // Get the front page.
    $front_page = get_posts(
      [
        'post_type'              => 'page',
        'title'                  => 'Acceuil',
        'post_status'            => 'all',
        'numberposts'            => 1,
      ]
    );

    // Get the blog page.
    $blog_page = get_posts(
      [
        'post_type'              => 'page',
        'title'                  => 'Blog',
        'post_status'            => 'all',
        'numberposts'            => 1,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
      ]
    );

    // woocommerce page IDs
    $shop_page_id = get_option( 'woocommerce_shop_page_id' ); 
    $cart_page_id = get_option( 'woocommerce_cart_page_id' ); 
    $checkout_page_id = get_option( 'woocommerce_checkout_page_id' ); 
    $account_page_id = get_option( 'woocommerce_myaccount_page_id' ); 

    // delete woocommerce pages
    wp_delete_post($shop_page_id);
    wp_delete_post($cart_page_id);
    wp_delete_post($checkout_page_id);
    wp_delete_post($account_page_id);

    // create new woocommerce page
    $woocommerce_cart = get_page_by_title( 'Panier' );
    $woocommerce_checkout = get_page_by_title( 'Validation de la commande' );
    $woocommerce_shop = get_page_by_title( 'Boutique' );
    $privacy_policy = get_page_by_title( 'Politique de Confidentialité' );
    $woocommerce_myaccount = get_page_by_path( 'Mon compte' );

    
    if ( ! empty( $woocommerce_cart ) || ! empty( $woocommerce_checkout ) ) {
      update_option( 'woocommerce_cart', $woocommerce_cart->ID );
      update_option( 'woocommerce_cart_page_id', $woocommerce_cart->ID );
      update_option( 'woocommerce_checkout_page_id', $woocommerce_checkout->ID );
      update_option( 'woocommerce_shop_page_id', $woocommerce_shop->ID );
      update_option( 'woocommerce_myaccount_page_id', $woocommerce_myaccount->ID );
      update_option( 'wp_page_for_privacy_policy', $privacy_policy->ID );
    }
   
    if ( ! empty( $front_page ) ) {
      update_option( 'page_on_front', $front_page[0]->ID );
    }

    if ( ! empty( $blog_page ) ) {
      update_option( 'page_for_posts', $blog_page[0]->ID );
    }
   
    if ( ! empty( $blog_page ) || ! empty( $front_page ) ) {
      update_option( 'show_on_front', 'page' );
    }
  }
  add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );



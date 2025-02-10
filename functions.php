<?php 
/**
 * 
 * Horizon Functions 
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package Horizon
 */

function load_scripts(){

    //enqueue style **  
    wp_enqueue_style( 'remixicon', get_template_directory_uri() . '/asset/fonts/remixicon.css',false,'1.1','all');
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/asset/css/owl.carousel.min.css',false,'0.1','all');
    wp_enqueue_style( 'accordioncss', get_template_directory_uri() . '/asset/css/accordion.min.css',false,'0.1','all');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/asset/css/custom.css',false,'0.0','all');
    
    //enqueue script **
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'accordionjs', get_template_directory_uri() . '/asset/js/accordion.min.js', false, 1.1, true);
    wp_enqueue_script( 'carousel', get_template_directory_uri() . '/asset/js/owl.carousel.min.js', false, '0.0', true);
    wp_enqueue_script( 'fslightbox', get_template_directory_uri() . '/asset/js/fslightbox.js', false, '0.1', true);

    // comments reply ** 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
   
    wp_enqueue_script( 'app', get_template_directory_uri() . '/asset/js/app.js', false, '0.0', true);

    // localize scripts **
    wp_localize_script( 'app', 'my_ajax_obj',
		array( 
			'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'ajax_nonce' ),
            'post_title'=> get_the_title(),
            'directory'=> get_template_directory_uri(),
		)
    );
    
};

add_action( 'wp_enqueue_scripts', 'load_scripts' );


//======================================================
//                admin enqueue scripts
//======================================================

get_template_part('core/admin/templates/enqueue');



//======================================================
//                    navigation menus
//======================================================

function register_my_menus() {

    register_nav_menus(
       array(

            'header' => __( 'Header Menu', 'text_domain' ),
            
            'footer'  => __( 'Footer Menu', 'text_domain' )
        
        )
    );

}

add_action( 'init', 'register_my_menus' );



//======================================================
//                    theme options
//======================================================

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'responsive-embeds' );



add_image_size('blog-mini', 150, 150, true);


//======================================================
//                    sidebars
//======================================================

function register_my_sidebars() {

    register_sidebar(
       array(

         'name'          => __( 'shop', 'textdomain' ),
		 'id'            => 'shop',
        
        )
    );

    register_sidebar(
        array(
 
          'name'          =>__( 'blog-sidebar', 'textdomain' ),
          'id'            => 'blog-sidebar',
         
         )
    );

}

add_action( 'widgets_init', 'register_my_sidebars' );


//======================================================
//                  Include files
//======================================================


get_template_part('inc/filter');
get_template_part('inc/header', 'cart');
get_template_part('inc/login', 'header');
get_template_part('inc/search', 'header');
get_template_part('inc/ajax');
get_template_part('inc/customizer');
get_template_part('core/admin/function','admin');
get_template_part('/core/elementor/elementor', 'widgets');
get_template_part('/core/demo/demo', 'import');
get_template_part('inc/custom/blog', 'custom');
get_template_part('inc/custom/footer','custom');

// ** woocommerce
get_template_part('inc/ecommerce/quick-view');
get_template_part('inc/ecommerce/setup');
get_template_part('inc/ecommerce/product-item');
get_template_part('inc/ecommerce/gallery');
get_template_part('inc/ecommerce/product-variations');



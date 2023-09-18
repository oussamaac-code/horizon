
<?php 


//======================================================
//                    enqueue scripts
//======================================================

function load_scripts(){

    //enqueue style   
    wp_enqueue_style( 'remixicon', get_template_directory_uri() . '/asset/fonts/remixicon.css',false,'1.1','all');
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/asset/css/owl.carousel.min.css',false,'0.1','all');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/asset/css/custom.css',false,'0.2','all');
    
    //enqueue script
    wp_enqueue_script( 'jquy', get_template_directory_uri() . '/asset/js/jquery-3.6.0.min.js', false, 1.1, true);
    wp_enqueue_script( 'counterjs', get_template_directory_uri() . '/asset/js/counter.min.js', false, '0.0', true);
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/asset/js/jquery.easing.js', false, '0.0', true);
    wp_enqueue_script( 'carousel', get_template_directory_uri() . '/asset/js/owl.carousel.min.js', false, '0.0', true);
    wp_enqueue_script( 'visiblejs', get_template_directory_uri() . '/asset/js/jquery.visible.min.js', false, '0.1', true);
    wp_enqueue_script( 'fslightbox', get_template_directory_uri() . '/asset/js/fslightbox.js', false, '0.1', true);
    wp_enqueue_script( 'swiperelementjs', get_template_directory_uri() . '/asset/js/swiper-element-bundle.min.js', false, '0.1', true);
   
    wp_enqueue_script( 'app', get_template_directory_uri() . '/asset/js/app.js', false, '0.0', true);

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


echo the_title();


//======================================================
//                    navigation menus
//======================================================

function register_my_menus() {

    register_nav_menus(
       array(

            'header' => __( 'Header Menu', 'text_domain' ),
            
            'footer'  => __( 'Footer Menu', 'text_domain' ),

            'terms'  => __( 'Terms Menu', 'text_domain' ),
        
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


add_image_size('blog-mini', 150, 150, true);



//======================================================
//                    sidebars
//======================================================

function register_my_sidebars() {

    register_sidebar(
       array(

         'name'          => __( 'shop', 'Horizon' ),
		 'id'            => 'shop',
        
        )
    );

    register_sidebar(
        array(
 
          'name'          => 'blog-sidebar',
          'id'            => 'blog-sidebar',
         
         )
     );

    

}

add_action( 'widgets_init', 'register_my_sidebars' );



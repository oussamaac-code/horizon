<?php
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue' );

function wpdocs_dequeue() {

    global $wp_query;
    $page_title = '';

    if(is_front_page()){

        // wp_dequeue_style( 'wp-block-library' );
        // wp_dequeue_style( 'wp-block-library-theme' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'create-block-related-post-style' );
        // wp_dequeue_style( 'create-block-author-block-style' );
        // wp_dequeue_style( 'create-block-border-block-style' );
        // wp_dequeue_style( 'create-block-todo-list-style' );
        // wp_dequeue_style( 'woocommerce-layout' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );
        // wp_dequeue_style( 'elementor-frontend-css' );
        // wp_dequeue_style( 'elementor-frontend' );
        // wp_dequeue_style( 'elementor-icons' );
        wp_dequeue_style( 'trp-language-switcher-style' );
        wp_dequeue_style( 'trp-floater-language-switcher-style' );
        wp_dequeue_style( 'contact-form-7' );
        wp_dequeue_style( 'swiper-css' );
        wp_dequeue_style( 'wc-blocks-style' );

        wp_dequeue_script( 'contact-form-7' );
        
    }

    if(is_shop()){

        // wp_dequeue_style( 'contact-form-7' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'wp-block-library' );

    }

    if( is_product() ){

        // wp_dequeue_style( 'contact-form-7' );
        // wp_dequeue_style( 'wp-block-library' );
        // wp_dequeue_style( 'wp-block-library-theme' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'create-block-related-post-style' );
        // wp_dequeue_style( 'create-block-author-block-style' );
        // wp_dequeue_style( 'create-block-border-block-style' );
        // wp_dequeue_style( 'create-block-todo-list-style' );

    }

    if($page_title=='Blog' || $page_title=='Faq' ){

        // wp_dequeue_style( 'contact-form-7' );
        // wp_dequeue_style( 'wp-block-library' );
        // wp_dequeue_style( 'wp-block-library-theme' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'create-block-related-post-style' );
        // wp_dequeue_style( 'create-block-author-block-style' );
        // wp_dequeue_style( 'create-block-border-block-style' );
        // wp_dequeue_style( 'create-block-todo-list-style' );
        // wp_dequeue_style( 'woocommerce-layout' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );
        // wp_dequeue_style( 'elementor-frontend-css' );


    }
    if($page_title=='Contact'){

        // wp_dequeue_style( 'wp-block-library' );
        // wp_dequeue_style( 'wp-block-library-theme' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'create-block-related-post-style' );
        // wp_dequeue_style( 'create-block-author-block-style' );
        // wp_dequeue_style( 'create-block-border-block-style' );
        // wp_dequeue_style( 'create-block-todo-list-style' );
        // wp_dequeue_style( 'woocommerce-layout' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );
        // wp_dequeue_style( 'elementor-frontend-css' );

    }

    if(is_single()){

        // wp_dequeue_style( 'contact-form-7' );
        // wp_dequeue_style( 'wp-block-library' );
        // wp_dequeue_style( 'wp-block-library-theme' );
        // wp_dequeue_style( 'wc-blocks-style' );
        // wp_dequeue_style( 'create-block-related-post-style' );
        // wp_dequeue_style( 'create-block-author-block-style' );
        // wp_dequeue_style( 'create-block-border-block-style' );
        // wp_dequeue_style( 'create-block-todo-list-style' );
        // wp_dequeue_style( 'woocommerce-layout' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );

    }
   
}



add_action('wp_print_styles', 'dequeue_elementor_global__css');

function dequeue_elementor_global__css() {

    if(is_front_page()){

        wp_dequeue_style('swiper');
        wp_deregister_style('swiper');

        wp_deregister_style('google-fonts-1');
    }

    
}


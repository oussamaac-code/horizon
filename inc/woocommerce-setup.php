<?php
// ****  Archive Product page  ****

function archive_product_page_sidebar() {

    if ( !is_product() ){

        add_action( 'woocommerce_before_main_content', function(){ ; ?>

            <div class="heading-product">
                <?php 
                    if ( is_shop() || is_product_category() ){
                        $target_post_id = wc_get_page_id( 'shop' );
                        $image = wp_get_attachment_url(get_post_thumbnail_id($target_post_id));
                        echo '<img src="' . $image. '" alt="">';   
                    }
                ; ?>
            
            <div class="container">

                
        <?php }, 11 );
        add_action( 'woocommerce_shop_loop_header', function(){ echo '</div> </div>'; } , 12 );


        add_action( 'woocommerce_before_shop_loop', function(){ echo '<div class="product-listing">';}, 9 );
        add_action( 'woocommerce_after_main_content', function(){ echo '</div>';}, 8 );


        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
        add_action( 'woocommerce_after_main_content' , 'woocommerce_get_sidebar', 9 );


        add_action( 'woocommerce_before_shop_loop', function(){ echo '<div class="product-all-wrapper"><div class="container">'; }, 8 );
        add_action( 'woocommerce_after_main_content', function(){ echo '</div> </div>'; }, 9 );


        add_action('woocommerce_before_shop_loop', function(){ 
            ;?>
                <div class="product-list-top">
                    <div class="filter-product-btn">
                        <i class="ri-equalizer-2-line"></i>
                        <a href="#"> <?php _e('Filtrer', 'textdomain'); ?></a>
                    </div>
            <?php 
        }, 18);
        add_action('woocommerce_before_shop_loop', function(){ echo '</div>'; }, 32);


        
    }
} 
add_action( 'wp', 'archive_product_page_sidebar' );




// ****  Cart page  ****


add_action('woocommerce_cart_is_empty', 'cart_page_heading_section', 0);
add_action('woocommerce_before_cart', 'cart_page_heading_section', 0);


function cart_page_heading_section(){
    ;?>
    <section class="heading-cart">
        <?php echo get_the_post_thumbnail(); ?>
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    <?php
}


add_action( 'woocommerce_before_cart' , function(){ echo '<div class="container cart-all-wrapper" >'; }, 1 );
add_action( 'woocommerce_after_cart' , function(){ echo '</div>'; } );


// ****  Checkout page  ****

add_action( 'woocommerce_checkout_before_order_review_heading', function(){ echo '<div class="right-checkout-container">'; } );
add_action( 'woocommerce_checkout_after_order_review', function(){ echo '</div>'; } );


// ****  Single product  ****


function single_product_page_sidebar() {

    if ( is_product() ){
        remove_action( 'woocommerce_sidebar' , 'woocommerce_get_sidebar', 10 );
    }
} 
add_action( 'wp', 'single_product_page_sidebar' );


// ****  Product card   ****


add_action('woocommerce_before_shop_loop_item_title' , function(){ echo '<div class="img">'; }, 9);
add_action('woocommerce_shop_loop_item_title' , function(){ echo '</div>'; }, 9);


remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating', 5 );


// (WOOCOMMERCE) currency to DH

//add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'MAD': $currency_symbol = 'Dh'; break;
    }
    return $currency_symbol;
}

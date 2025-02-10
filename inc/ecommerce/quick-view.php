<?php
/**
* Woocommerce Product Item
* 
* @package Horizon
*
*/

// quick view hooks
add_action('hrzn_custom_hook_action_image', 'woocommerce_show_product_sale_flash', 10);
// add_action('hrzn_custom_hook_action_image', 'woocommerce_show_product_images', 20);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_title', 5);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_rating', 10);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_price',10);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_excerpt', 20);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_add_to_cart', 25);
//add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_meta', 40);
add_action('hrzn_custom_hook_action_summury', 'woocommerce_template_single_sharing', 50);


// quick view ajax
add_action( 'wp_ajax_hrzn_quick_view_btn', 'my_ajax_handler_hrzn_quick_view_btn' );
add_action( 'wp_ajax_nopriv_hrzn_quick_view_btn', 'my_ajax_handler_hrzn_quick_view_btn' );


function my_ajax_handler_hrzn_quick_view_btn() {
    
    check_ajax_referer( 'ajax_nonce' );

    $query = new WP_Query([

        'post_type'      => 'product',
        'post_status'    => 'publish',
        'p'   => $_POST['product_id']
    ]);
    
    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();

            //do_action('hrzn_custom_hook_action_image');?>

               
                    
                <div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>

                    <div class="images">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image">
                    </div>

                    <div class="summary entry-summary">
                        <div class="summary-content">
                            <?php do_action( 'hrzn_custom_hook_action_summury' ); ?>
                        </div>
                    </div>

                </div>
                        
                
            <?php 

        endwhile; 
        
        wp_reset_query();
        
    endif; 

    wp_die();
}


// quick view container
add_action('hrzn_footer_hook', 'hrzn_quick_view_container'); 

function hrzn_quick_view_container(){ ;?>

    <div class="quick-view-content">
        <div class="wrapper">
            <div class="close">
                <a href="#"><i class="ri-close-line"></i></a>
            </div>
            <div class="product-hrzn"></div>
        </div>
    </div>

<?php 
}
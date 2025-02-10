<?php
/**
* Woocommerce Product Item
* 
* @package Horizon
*
*/


// ** Product title
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 11);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);


// ** Product link
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 10);


// ** Change position of price
remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 11);


// ** Product image
add_action('woocommerce_before_shop_loop_item_title' ,'horizon_product_item_image_wrapper', 9);
add_action('woocommerce_shop_loop_item_title' , 'horizon_after_product_item_image_wrapper', 9);

function horizon_product_item_image_wrapper(){ ;?>
    <div class="img">
        <a href="#" class="quick-view-button" data-pid="<?php the_ID(); ?>">  <?php _e('Quick View', 'textdomain');?> <i class="ri-eye-line"></i> </a>
<?php }


function horizon_after_product_item_image_wrapper(){ ;?>

    </div>
<?php }


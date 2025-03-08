<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Horizon
 */

get_header();
?>

    <main>

        <?php 
            if ( class_exists( 'woocommerce' ) ) { 

                if ( is_checkout() || is_cart() ){

                    $cart_page_url = wc_get_cart_url();
                    $checkout_page_url = wc_get_checkout_url();
                    
                    ; ?>

                    <section class="heading-cart">
                        <?php echo get_the_post_thumbnail(); ?>
                        <div class="container">
                            <?php if ( is_checkout() && !empty( is_wc_endpoint_url('order-received') ) ) { ;?>

                                <h1><?php _e('Thank you','textdomain'); ?></h1>

                            <?php }else{ ;?>
                                
                                <h1><?php the_title(); ?></h1>

                            <?php }; ?>
                        </div>
                    </section>

                    <ul class="breadcrumbs-woocommerce container">
                        <li <?php if( is_cart() ){ echo 'class="active"';};?> >
                            <a href="<?php echo $cart_page_url ;?>" > <?php _e('Shopping cart', 'textdoamin');?> </a>
                        </li>
                        <li <?php if( is_checkout() && empty( is_wc_endpoint_url('order-received') ) ){ echo 'class="active"';};?>>
                            <a href="<?php echo $checkout_page_url ;?>"> <?php _e('Checkout details', 'textdoamin');?> </a>
                        </li>
                        <li <?php if ( is_checkout() && !empty( is_wc_endpoint_url('order-received') ) ) { echo 'class="active"';}; ?>>
                            <span><?php _e('Order complete', 'textdoamin');?></span>
                        </li>
                    </ul>

                <?php }
            }
        ; ?>

        <?php the_content() ;?>
        
    </main>

<?php  
get_footer();
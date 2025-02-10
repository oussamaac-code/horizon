<?php
/**
 * This file contains all the ajax Calls
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Horizon
 */

 /**
 * Handles my AJAX Featured product request.
 */

add_action( 'wp_ajax_my_category_filter', 'my_ajax_handler_featured_product' );
add_action( 'wp_ajax_nopriv_my_category_filter', 'my_ajax_handler_featured_product' );


function my_ajax_handler_featured_product() {
	
    check_ajax_referer( 'ajax_nonce' );


    echo do_shortcode('[products columns="4" category="'.$_POST['category'].'" limit="8" ]');
	wp_die();
}

/**
 * Handles my AJAX Likes.
 */

 add_action( 'wp_ajax_my_post_likes', 'my_ajax_handler_post_likes' );
 add_action( 'wp_ajax_nopriv_my_post_likes', 'my_ajax_handler_post_likes' );


 function my_ajax_handler_post_likes() {
	
    check_ajax_referer( 'ajax_nonce' );

    $update_likes= update_post_meta( $_POST['post_ID'], '_hr_box_likes', $_POST['hr_field_value']);

    if( $update_likes ){

        echo get_post_meta( $_POST['post_ID'], '_hr_box_likes' )[0];
    }

	wp_die();
}

/**
 * Handles AJAX update quantity cart
 */

 add_action( 'wp_footer', function() {
	
	?><script>
	jQuery( function( $ ) {
		let timeout;
		$('.woocommerce').on('change', 'input.qty', function(){
			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout(function() {
				$("[name='update_cart']").trigger("click");
			}, 800 );
		});
	} );
	</script><?php
	
} );
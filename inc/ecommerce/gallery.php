<?php
/**
* Woocommerce Product Gallery
* 
* @package Horizon
*
*/

add_action('woocommerce_after_single_product_summary', 'hrzn_single_product_gallery');

function hrzn_single_product_gallery(){
    ;?>

        <script>
            jQuery(document).ready(function($){

                //$('.woocommerce div.product div.images ol.flex-control-thumbs').addClass('owl-carousel owl-theme');

            })
        </script>

    <?php
}
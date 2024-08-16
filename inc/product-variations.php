<?php
/**
 * Woocommerce Single Product Variations
 * 
 * @package Horizon
 */

add_action('woocommerce_before_single_variation','horizon_single_variation_template');

function horizon_single_variation_template() { ;

    ?>
        <script>
            jQuery(document).ready(function($){ 
                /**
                 * 
                 * Variation Product 
                 * 
                 */
                
                $("<div class='horizon-bulk-variations'></div>").insertBefore('.woocommerce form.cart .single_variation_wrap');

                $('.woocommerce form.cart .variations  select#pa_taille option').each(function(){

                    if($(this).val()!=""){
                        $('.woocommerce form.cart .horizon-bulk-variations').append('<button class="variation" data-variation="'+$(this).val()+'">'+$(this).text()+'</button>')
                    }
                })



                if( $('woocommerce form.cart .horizon-bulk-variations') ){

                    $('.horizon-bulk-variations button').click(function(e){
                        e.preventDefault();
                        var data= $(this).data('variation');
                        $("#pa_taille").val(data).trigger("change");
                        $(this).addClass('selected');
                        $('.horizon-bulk-variations button').not($(this)).removeClass('selected')
                    })
                }

            })
            </script>
            
    <?php
}

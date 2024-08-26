<?php
/**
 * Woocommerce Single Product Variations
 * 
 * @package Horizon
 */

add_action('woocommerce_before_main_content','horizon_single_variation_template');

function horizon_single_variation_template() { 

   $product_attributes= json_encode(get_the_terms(get_the_ID(), 'pa_couleur'));

    ?>
        <script>
            jQuery(document).ready(function($){ 

                var js_data = '<?php print_r($product_attributes) ; ?>';
                var js_obj_data = JSON.parse(js_data );     
                console.log(js_obj_data);

                /**
                 * 
                 * Variation Variations
                 */
                
                 $('.woocommerce form.cart table.variations select').on('change', function(){

                    // append Clear button

                    if( !$('.woocommerce .clear-attribute-producto').length){

                        $("<div class='clear-attribute-producto'> <a class='reset_variations' href='#'> <i class='ri-close-line'></i> Effacer </a>  </div>").insertBefore('.woocommerce form.cart .single_variation_wrap');

                    }else{
                        if($(this).val()==''){
                            $('.woocommerce .clear-attribute-producto a').hide()
                        }else{

                            $('.woocommerce .clear-attribute-producto a').show()
                        }
                    }

                    $('.woocommerce .clear-attribute-producto a').click(function(){
                        $('.woocommerce form.cart .horizon-bulk-taille-variations .variations button').removeClass('close selected')
                        $('.woocommerce form.cart .horizon-bulk-couleur-variations .variations button').removeClass('close selected')
                        $(this).hide()
                    })

                    // Taille / Size
                    setTimeout(() => {
                        
                        $('.woocommerce form.cart .horizon-bulk-taille-variations .variations button').each(function(){
                            var variation_element= $(this);

                            $('.woocommerce form.cart table.variations select#pa_taille option').each(function(){
                                variation_element.addClass('close');

                                if($(this).val()==variation_element.attr('data-variation')){

                                    variation_element.removeClass('close');
                                    return false;
                                }
                            })
                        })

                    }, 10);

                    // Color / Couleur
                    setTimeout(() => {
                        
                        $('.woocommerce form.cart .horizon-bulk-couleur-variations .variations button').each(function(){
                            var variation_element= $(this);

                            $('.woocommerce form.cart table.variations select#pa_couleur option').each(function(){
                                variation_element.addClass('close');

                                if($(this).val()==variation_element.attr('data-variation')){

                                    variation_element.removeClass('close');
                                    return false;
                                }
                            })
                        })

                    }, 10);


                 })

                /**
                 * 
                 * Variation Product For Taille/Size
                 * 
                 */

                var pa_taille_label= $('.woocommerce form.cart .variations tr:has(select#pa_taille) th label').text();
                
                $("<div class='horizon-bulk-taille-variations'> <div class='label'></div> <div class='variations'> </div> </div>").insertBefore('.woocommerce form.cart .single_variation_wrap');


                $('.woocommerce form.cart .horizon-bulk-taille-variations .label').append(pa_taille_label);
                
                $('.woocommerce form.cart table.variations  select#pa_taille option').each(function(){

                    if($(this).val()!=""){
                        $('.woocommerce form.cart .horizon-bulk-taille-variations .variations').append('<button class="variation" data-variation="'+$(this).val()+'">'+$(this).text()+'</button>')
                    }
                })

                if( $('woocommerce form.cart .horizon-bulk-taille-variations') ){

                    $('.horizon-bulk-taille-variations button').click(function(e){

                        if($(this).hasClass('close')){
                            e.preventDefault();
                        }else{

                            e.preventDefault();
                            var data= $(this).data('variation');

                            if($("#pa_taille").val()==data){

                                $("#pa_taille").val('').trigger("change");
                                $(this).removeClass('selected');

                            }else{

                                $("#pa_taille").val(data).trigger("change");
                                $(this).addClass('selected');
                                $('.horizon-bulk-taille-variations button').not($(this)).removeClass('selected')
                            }
                        }
                    })
                }

                /**
                 * 
                 * Variation Product For Couleur/Color
                 * 
                 */
                var pa_taille_label= $('.woocommerce form.cart .variations tr:has(select#pa_couleur) th label').text();
                
                $("<div class='horizon-bulk-couleur-variations'> <div class='label'></div> <div class='variations'> </div> </div>").insertBefore('.woocommerce form.cart .single_variation_wrap');

                $('.woocommerce form.cart .horizon-bulk-couleur-variations .label').append(pa_taille_label);
                
                $('.woocommerce form.cart table.variations  select#pa_couleur option').each(function(){

                    if($(this).val()!=""){

                        var hexColor= '';
                        var optionVal=$(this);

                        $.each(js_obj_data ,function(i){

                            if(js_obj_data[i].slug==optionVal.val()){

                                $('.woocommerce form.cart .horizon-bulk-couleur-variations .variations').append('<button class="variation" data-color="'+js_obj_data[i].description+'" style="background-color: '+js_obj_data[i].description+'" data-variation="'+optionVal.val()+'"></button>')
                            }
                        })
                    }
                })

                if( $('woocommerce form.cart .horizon-bulk-couleur-variations') ){

                    $('.horizon-bulk-couleur-variations button').click(function(e){

                        if($(this).hasClass('close')){
                            e.preventDefault();
                        }else{
                            
                            e.preventDefault();
                            var data= $(this).data('variation');
                            if( $("#pa_couleur").val()==data ){

                                $("#pa_couleur").val('').trigger("change");
                                $(this).removeClass('selected');

                            }else{

                                $("#pa_couleur").val(data).trigger("change");
                                $(this).addClass('selected');
                                $('.horizon-bulk-couleur-variations button').not($(this)).removeClass('selected')

                            }
                        }

                    })
                }

            })
            </script>
            
    <?php
}


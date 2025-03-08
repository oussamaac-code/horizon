<?php 
/**
 * 
 * Sample implementation of the Header Search Ajax.
 *
	<?php
		if ( function_exists( '_depot_header_search_button' ) ) {
			_depot_header_search_button();
		}
	?>
 */

 if ( ! function_exists( '_depot_header_search_button' ) ) {
	/**
	 * Header Login .
	 *
	 * Display a login button and show account and profile links.
	 *
	 * @return void
	 */
	function _depot_header_search_button() {

        ;?>
            <div class="search">
                <a href=""><i class="ri-search-line"></i></a>

                <div class="search-container close">
                    <div class="content">
                        <h4><?php _e('Enter your keyword here','textdomain'); ?></h4>
                        <div class="close"> <i class="ri-close-large-line"></i> </div>
                        <div class="search-form">
                            <?php get_search_form(); ?>
                        </div>
                        <div class="search-result"></div>
                    </div>
                </div>
            </div>

            <script>

                    jQuery(document).ready(function($) {  

                        // **  Search Open/Close events  **

                        $('header#main-header .search>a').click(function(e){
                            e.preventDefault();
                            $('header#main-header .search-container').removeClass('close')
                        })

                        $('header#main-header .search .content .close').click(function(){
                            $('header#main-header .search .search-container').addClass('close')
                        })

                        // **  Search input Form  **
   
                        var searchForm= $('.search-container .search-form input');

                        searchForm.on('input', function() { 

                            if( $(this).val()=="" ){
                                $('.search-container .search-result').html('')
                            }else{

                                $.post(my_ajax_obj.ajax_url, {     
    
                                    _ajax_nonce: my_ajax_obj.nonce, 
                                    action: "my_search_result",         
                                    keyword: $(this).val()          
                                    }, function(data) {         
                                        $('.search-container .search-result').html(data)
                                    }
    
                                );

                            }


                        });

                    });

                </script>
        <?php

	}
}

/**
 * Handles my AJAX Search query.
 */

 add_action( 'wp_ajax_my_search_result', 'my_ajax_handler_search' );
 add_action( 'wp_ajax_nopriv_my_search_result', 'my_ajax_handler_search' );


 function my_ajax_handler_search() {
	
    check_ajax_referer( 'ajax_nonce' );

    $query = new WP_Query([

        'post_type'      => 'post',
        'post_status'   => 'publish',
        'posts_per_page' => 8,
        's' => $_POST['keyword']
        
    ]);

    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post(); 

            get_template_part('templates/parts/search', 'card');
    
        endwhile; 
    endif; 

	wp_die();
}
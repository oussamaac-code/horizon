<?php
/**
 * 
 * @package Horizon
 * 
 * Template Name: Blog
 */

get_header();
?>


<main>
    <?php get_template_part('templates/parts/section', 'heading' , ['key'=> 'blog'] ); ?>

    <section class="blog-archive-grid">
        <div class="container">
            <div class="archive">
                <?php
                
                    $query = new WP_Query([

                        'post_type'      => 'post',
                        'post_status'   => 'publish',
                        'posts_per_page' => 9,
                        'paged' => get_query_var( 'paged' )
                        
                    ]);

                    if ( $query->have_posts() ) : 
                        while ( $query->have_posts() ) : $query->the_post(); 

                            get_template_part('templates/parts/blog', 'card');
                    
                        endwhile; 
                    endif; 

                    wp_reset_query();
                
                ;?>
            </div>

            <!-- pagination -->
            <div class="pagination-nav-links">
                <?php

                    if( $query->max_num_pages > 1 ) {

                        $big = 999999;
                        echo paginate_links( array(
                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'    => '?paged=%#%',
                            'current'   => max( 1, $paged ),
                            'total'     => $query->max_num_pages
                        ) );
                    }
                
                ;?>
            </div>

        </div>
    </section> 

</main>



<?php get_footer();
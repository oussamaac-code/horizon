

<?php

/**
* Template Name: Blog
*/

get_header(); ?>


    <main>

        <?php
                    
            $query = new WP_Query([

                'post_type'      => 'post',
                'posta_status'   => 'publish',
                
            ]);

            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post(); 

                    get_template_part('template-parts/blog', 'card');
            
                endwhile; 
            endif; 
        
        ;?>

    </main>



<?php get_footer() ;?>
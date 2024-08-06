<?php
$postcat= get_the_category(); 
foreach($postcat as $cat){
    $postcatarr[]=$cat->term_id;
}
;?>

<section class="related-posts-single">
    <div class="container">
        <h3 class="section-title">Related Content</h3>
        <ul class="owl-carousel owl-theme">
            <?php
                
                $query = new WP_Query([

                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 5,
                    'category_in'    => $postcatarr,
                    'post__not_in'   => [get_the_ID()]
                ]);

                if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); ?>

                        <li>
                            <?php get_template_part('templates/parts/blog', 'card'); ?>

                        </li>
                        <?php

                    endwhile; 

                    wp_reset_query();
                    
                endif; 
            ?>
        </ul>
        <!-- posts -->
    </div>
</section>

<script>
    jQuery(document).ready(function($){ 

        $('section.related-posts-single ul ').owlCarousel({
            loop:true,
            margin:30,
            autoplay:true,
            autoplayTimeout:2500,
            autoHeight:false,
            smartSpeed: 700,
            //autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })

    })
</script>
<?php 
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Horizon
 */

get_header();
?>

    <main>

        <?php $t= get_search_query(); ?>

        <?php get_template_part('template-parts/section', 'heading', ['key'=> $t ]) ;?>

        <br>
        <br>

        <div class="container archive">

            <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                <?php get_template_part('template-parts/blog', 'card') ;?>
             
            <?php endwhile; else: endif; ?>

        </div>
        
        <br>
        <br>
    </main>

<?php  
get_footer();
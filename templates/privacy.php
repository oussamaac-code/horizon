<?php
/**
 * 
 * @package Horizon
 * 
 * Template Name: Privacy
 */

get_header(); ?>


    <main>
        <?php get_template_part('templates/parts/section', 'heading' , ['key'=> get_the_title() ] ); ?>


        <section class="content-privacy">
            <div class="container">

                <?php the_content() ;?>
            </div>
        </section>

    </main>



<?php get_footer() ;?>
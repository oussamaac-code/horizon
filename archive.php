


<?php get_header() ;?>

    <main>

        <?php $t= get_the_archive_title(); ?>

        <?php get_template_part('template-parts/section', 'heading', ['key'=> $t ]) ;?>

        <div class="container">
            

            <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                <?php get_template_part('template-parts/blog', 'card') ;?>
             
            <?php endwhile; else: endif; ?>


        </div>
        
    </main>

<?php  get_footer() ;?>
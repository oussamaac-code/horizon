

<?php get_header() ;?>

    <main>

        <section class="blog">
            <div class="container">
                <div class="article">
                    <div class="thumbnail">
                        <?php echo get_the_post_thumbnail() ;?>
                    </div>
                    <div class="meta"></div>
                    <article>
                        <?php the_content();?>
                    </article>
                </div>
                
                <div class="sidebar">
                    <?php if(is_active_sidebar('blog-sidebar')): ?>

                        <?php dynamic_sidebar('blog-sidebar') ;?>

                    <?php  endif; ?>
                </div>
            </div>
        </section>

    </main>

<?php  get_footer() ;?>
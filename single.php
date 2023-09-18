

<?php get_header() ;?>

    <main>

        <section class="blog">
            <div class="container">
                <div class="article"></div>
                <div class="sidebar">
                    <?php if(is_active_sidebar('blog-sidebar')): ?>

                        <?php dynamic_sidebar('blog-sidebar') ;?>

                    <?php  endif; ?>
                </div>
            </div>
        </section>

    </main>

<?php  get_footer() ;?>
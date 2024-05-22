<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Horizon
 */

get_header();
?>

    <main>

        <!-- Choose Class: middle - right-sidebar - left-sidebar -->
        <section class="blog">
            <div class="container">
                <div class="article">
                    <div class="thumbnail">
                        <?php echo get_the_post_thumbnail() ;?>
                    </div>
                    <div class="post-details">
                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                    </div>
                    <article>
                        <?php the_content();?>
                    </article>
                    <?php comments_template() ;?>
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
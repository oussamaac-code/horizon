<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Horizon
 * 
 * Template Name: Middle Article
 * Template Post Type: post 
 */

get_header();
?>

<main>

    <section class="blog middle">
        <div class="container">
            <div class="article">
                <div class="tags">
                    <?php the_category(); ?>
                </div>

                <h1><?php the_title(); ?></h1>

                <div class="post-details">
                    <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M, Y'); ?></time>
                    <span class="ball">•</span>
                    <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                </div>

                <div class="share">
                    <span>share:</span>
                    <ul>
                        <li><a href=""><i class="ri-facebook-fill"></i></a></li>
                        <li><a href=""><i class="ri-twitter-x-line"></i></a></li>
                        <li><a href=""><i class="ri-reddit-line"></i></a></li>
                        <li><a href=""><i class="ri-link-m"></i></a></li>
                    </ul>
                </div>

                <div class="thumbnail">
                    <?php echo get_the_post_thumbnail() ;?>
                </div>

                <article>
                    <?php the_content();?>
                </article>

                <?php comments_template() ;?>
            </div>
        </div>
    </section>

    <?php  get_template_part('templates/parts/related', 'content'); ?>

</main>

<?php  get_footer() ;?>
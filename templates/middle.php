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

                <div class="thumbnail">
                    <?php echo get_the_post_thumbnail() ;?>
                </div>

                <?php get_template_part('templates/parts/share', 'links'); ?>

                <article>
                    <?php the_content();?>
                </article>

                <?php //get_template_part('templates/parts/blog', 'newsletter'); ?>

                <?php comments_template() ;?>
            </div>

            <div class="post-share">
                <div class="inner">
                    <span>Share</span>
                    <ul>
                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=https://med-iptv.com/" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/intent/tweet?url=https://med-iptv.com/&text=Hello%20world" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                        <li class="reddit"><a href="http://www.reddit.com/submit?url=https://med-iptv.com/&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                        <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </section>

    <?php  get_template_part('templates/parts/related', 'content'); ?>

</main>


<?php  get_footer() ;?>
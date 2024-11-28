<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Horizon
 */

get_header();
?>

<main>
    <?php 
    $template= get_theme_mod('horizon_theme_blog_template1');

    switch ( $template ){
        case 'template1':
            ;?>
                <section class="blog-page template1">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item1">

                                        <div class="post-date">
                                            <div class="day"><?php echo get_the_date('j'); ?></div>
                                            <div class="date">
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('M Y'); ?></a>
                                            </div>
                                        </div>

                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>

                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <?php the_excerpt(); ?>
                                            <a href="<?php the_permalink(); ?>" class="read-more"> <i class="ri-arrow-right-line"></i> </a>
                                        </div>

                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>

                        <aside>
                            <?php if(is_active_sidebar('blog-sidebar')): dynamic_sidebar('blog-sidebar'); endif; ?>
                        </aside>
                    </div>
                </section>
            <?php
            break;
        case 'template2':
            ;?>
                <section class="blog-page template2">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item2">
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>
                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <p><?php the_excerpt(); ?></p>
                                            <div class="meta">
                                                <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('j M Y'); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="comments"> <?php echo get_comments_number(); ?> <i class="ri-chat-1-line"></i> </a>
                                            </div>
                                            <a href="<?php the_permalink();?>" class="read-more"><?php _e('Read More', 'textdomain');?></a>
                                        </div>
                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>

                        <aside>
                            <?php if(is_active_sidebar('blog-sidebar')): dynamic_sidebar('blog-sidebar'); endif; ?>
                        </aside>
                    </div>
                </section>
            <?php
            break;
        case 'template3':
            ;?>
                <section class="blog-page template3">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item3">
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>
                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <div class="meta">
                                                <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('j M Y'); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="comments"> <?php echo get_comments_number(); ?> <i class="ri-chat-1-line"></i> </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            break;
        case 'template4':
            ;?>
                <section class="blog-page template4">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item3">
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>
                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <div class="meta">
                                                <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('j M Y'); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="comments"> <?php echo get_comments_number(); ?> <i class="ri-chat-1-line"></i> </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>

                        <aside>
                            <?php if(is_active_sidebar('blog-sidebar')): dynamic_sidebar('blog-sidebar'); endif; ?>
                        </aside>
                    </div>
                </section>
            <?php
            break;
        case 'template5':
            ;?>
                <section class="blog-page template5">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item5">
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>
                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <div class="meta">
                                                <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('j M Y'); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="comments"> <?php echo get_comments_number(); ?> <i class="ri-chat-1-line"></i> </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            break;
        case 'template6':
            ;?>
                <section class="blog-page template6">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>
    
                                    <div class="blog-item5">
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>
                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <div class="meta">
                                                <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('j M Y'); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="comments"> <?php echo get_comments_number(); ?> <i class="ri-chat-1-line"></i> </a>
                                            </div>
                                        </div>
                                    </div>
    
                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>

                        <aside>
                            <?php if(is_active_sidebar('blog-sidebar')): dynamic_sidebar('blog-sidebar'); endif; ?>
                        </aside>
                    </div>
                </section>
            <?php
            break;
            
        default:
            ;?>
                <section class="blog-page template1">
                    <div class="container">
                        <div class="content-wrap">

                            <div class="content">
                                <?php  if( have_posts() ): while( have_posts() ): the_post() ;?>

                                    <div class="blog-item1">

                                        <div class="post-date">
                                            <div class="day"><?php echo get_the_date('j'); ?></div>
                                            <div class="date">
                                                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date('M Y'); ?></a>
                                            </div>
                                        </div>

                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                        </div>

                                        <div class="item-source">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                            }
                                            ;?>
                                            <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                                            <?php the_excerpt(); ?>
                                            <a href="<?php the_permalink(); ?>" class="read-more"> <i class="ri-arrow-right-line"></i> </a>
                                        </div>

                                    </div>

                                <?php endwhile; else: endif;  wp_reset_query();?>
                            </div>

                            <!-- pagination -->
                            <div class="pagination-nav-links">
                                <?php

                                    $big = 999999;
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $wp_query->max_num_pages
                                    ) );
                                
                                ;?>
                            </div>
                        </div>

                        <aside>
                            <?php if(is_active_sidebar('blog-sidebar')): dynamic_sidebar('blog-sidebar'); endif; ?>
                        </aside>
                    </div>
                </section>
            <?php
    }
    ;?>
</main>

<?php  
get_footer();
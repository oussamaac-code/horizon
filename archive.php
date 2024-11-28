<?php 
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Horizon
 */

get_header();
?>

<main>
    <section class="archive">
        <div class="container">

            <div class="contents">

                <h1 class="archive_title"><?php echo get_the_archive_title(); ?></h1>

                <div class="articles">
                    <?php 
                        $template= get_theme_mod('horizon_theme_author_template1');

                        switch ($template) {
                            case 'template1': ;?>
                                
                                <div class="content-wrap1">

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

                                <?php
                                break;
                            
                            case 'template2': ;?>

                                <div class="content-wrap2">

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
                                                        <a href="<?php echo get_the_author_url(); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
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

                                <?php
                                break;
                            
                            case 'template3': ;?>

                                <div class="content-wrap3">

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
                                                        <a href="<?php echo get_the_author_url(); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
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

                                <?php 
                                break;
                            
                            case 'template4': ;?>
                                
                                <div class="content-wrap4">

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
                                                        <a href="<?php echo get_the_author_url(); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
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

                                <?php 
                                break;
                            
                            default: ;?>
                                
                                <div class="content-wrap2">

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
                                                        <a href="<?php echo get_the_author_url(); ?>" class="author"> <span><?php _e('By ', 'textdomain'); ?></span> <?php echo get_the_author(); ?> </a>
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
                                <?php 
                                break;
                        }
                    ;?>
                </div>
                
            </div>

            <aside>
                <?php if(is_active_sidebar('blog-sidebar')): ?>

                    <?php dynamic_sidebar('blog-sidebar') ;?>

                <?php  endif; ?>
            </aside>

        </div>
    </section>
</main>

<?php  
get_footer();

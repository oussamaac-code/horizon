<?php
/**
 * 
 * Front Page Template
 * 
 * This page is for displaying main Home page.
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package Horizon
 */

get_header();
?>

    <main>
        <section class="author">
            <div class="container">

                <div class="contents">

                    <div class="prsn-informations">
                        <div class="avatar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 250 ); ?>
                        </div>

                        <h4 class="author_name"> <?php echo get_author_name(); ?> </h4>

                        <p class="author_bio"><?php echo get_the_author_description(); ?></p>

                        <div class="meta">
                            <div class="count"> <span><?php echo count_user_posts( get_the_author_ID() ) ;?></span> <?php _e('Articales Published', 'textdomain'); ?></div>
                            <?php if( get_field('instagram', 'user_'.get_the_author_ID().'' ) || get_field('facebook', 'user_'.get_the_author_ID().'' )  || get_field('twitter', 'user_'.get_the_author_ID().'' ) ) : ;?>
                                <div class="social-media">
                                    <span><?php _e('Follow', 'textdomain'); ?></span>
                                    <ul>
                                        <?php if(  get_field('instagram', 'user_'.get_the_author_ID().'' ) ) : ;?>
                                            <li><a target="blank" href="<?php echo get_field('instagram', 'user_'.get_the_author_ID().'' ); ?>"> <i class="ri-instagram-line"></i> </a></li>
                                        <?php endif; ?>
                                        <?php if(  get_field('facebook', 'user_'.get_the_author_ID().'' ) ) : ;?>
                                            <li><a target="blank" href="<?php echo get_field('facebook', 'user_'.get_the_author_ID().'' ); ?>"> <i class="ri-facebook-fill"></i>  </a></li>
                                        <?php endif; ?>
                                        <?php if(  get_field('twitter', 'user_'.get_the_author_ID().'' ) ) : ;?>
                                            <li><a target="blank" href="<?php echo get_field('twitter', 'user_'.get_the_author_ID().'' ); ?>"> <i class="ri-twitter-x-line"></i> </a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

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
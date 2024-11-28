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

    <?php

    $template_post = get_field('Post_Template') ? get_field('Post_Template') : '';

    switch ($template_post) {
        case 'template1': ;?>

            <section class="blog-template1">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                        <div class="article-informations">
                            
                            <div class="tags">
                                <?php the_category(); ?>
                            </div>
                            <h1><?php the_title(); ?></h1>
                            
                            <div class="post-details">
                                <div class="author">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                        <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                    </a>

                                </div>
                                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                                <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                            </div>

                        </div>

                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">

                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

            </section>

            <?php 
            break;
        
        case 'template2': ;?>

            <section class="blog-template2">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                        <div class="article-informations">
                            
                            <div class="tags">
                                <?php the_category(); ?>
                            </div>
                            <h1><?php the_title(); ?></h1>
                            
                            <div class="post-details">
                                <div class="author">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                        <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                    </a>

                                </div>
                                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                                <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                            </div>

                        </div>

                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">

                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

            </section>
            
            <?php 
            break;
        
        case 'template3': ;?>
            
            <section class="blog-template3">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                    </div>

                    <div class="article-informations">
                            
                        <div class="tags">
                            <?php the_category(); ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        
                        <div class="post-details">
                            <div class="author">
                                <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                    <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                    <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                </a>

                            </div>
                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                            <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                        </div>

                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">

                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

            </section>

            <?php 
            break;
        
        case 'template4': ;?>

            <section class="blog-template4 container">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                    </div>

                    <div class="article-informations">
                            
                        <div class="tags">
                            <?php the_category(); ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        
                    </div>

                    <div class="post-details">

                        <div class="auth">
                            <div class="author">
                                <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                    <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                    <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                </a>

                            </div>
                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                            <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                        </div>

                        <div class="post-share">
                            <ul>
                                <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                            </ul>
                        </div>
                        
                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">

                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

                <aside>
                    <?php if(is_active_sidebar('blog-sidebar')): ?>

                        <?php dynamic_sidebar('blog-sidebar') ;?>

                    <?php  endif; ?>
                </aside>

            </section>
            
            <?php
            break;
        case 'template5': ;?>

            <section class="blog-template5 container">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                    </div>

                    <div class="article-informations">
                            
                        <div class="tags">
                            <?php the_category(); ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        
                    </div>

                    <div class="post-details">

                        <div class="auth">
                            <div class="author">
                                <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                    <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                    <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                </a>

                            </div>
                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                            <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                        </div>

                        <div class="post-share">
                            <ul>
                                <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                            </ul>
                        </div>

                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">

                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

                <aside>
                    <?php if(is_active_sidebar('blog-sidebar')): ?>

                        <?php dynamic_sidebar('blog-sidebar') ;?>

                    <?php  endif; ?>
                </aside>

            </section>
            
            <?php
            break;
        
        default: ;?>

            <section class="blog-template1">

                <div class="article">

                    <div class="post-principale">

                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail() ;?>
                        </div>

                        <div class="article-informations">
                            
                            <div class="tags">
                                <?php the_category(); ?>
                            </div>
                            <h1><?php the_title(); ?></h1>
                            
                            <div class="post-details">
                                <div class="author">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <span class="author-avatar"> <?php echo get_avatar( $post->post_author ); ?> </span>
                                        <span class="author-name"> <?php _e('By','textdomain'); ?> <?php the_author_meta('display_name', $post->post_author); ?> </span>
                                    </a>

                                </div>
                                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                                <a href="#comments" class="comment-count"> <i class="ri-chat-1-line"></i> <?php echo get_comments_number(); ?></a>
                            </div>

                        </div>

                    </div>

                    <article>
                        <?php the_content();?>
                    </article>

                    <div class="article-foot">
                        
                        <div class="tags">
                            <?php the_tags('' , ' ' , ''); ?>
                        </div>

                        <div class="post-actions">

                            <div class="like">
                                <a href="#">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <?php $postLikes= get_post_meta( $post->ID, '_hr_box_likes' )? get_post_meta( $post->ID, '_hr_box_likes' )[0]: update_post_meta( $post->ID, '_hr_box_likes' , 0) ;?>
                                <span class="count"> <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ; ?>  </span>
                            </div>

                            <script>

                                jQuery(document).ready(function($) {  

                                    // **  AJAX LIKES  **

                                    var likeButton= $('.post-actions .like a');

                                    function handler1(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo ++get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').addClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler2);
                                    }

                                    function handler2(e) {

                                        e.preventDefault();
                                        $.post(my_ajax_obj.ajax_url, {     

                                            _ajax_nonce: my_ajax_obj.nonce, 
                                            action: "my_post_likes", 
                                            hr_field_value: <?php echo get_post_meta( $post->ID, '_hr_box_likes' )[0] ;?>,        
                                            post_ID: <?php echo $post->ID; ?>         
                                            }, function(data) {         
                                                $('.post-actions .like .count').html(data)
                                                $('.post-actions .like').removeClass('liked')
                                            }

                                        );

                                        $(this).one("click", handler1);
                                    }

                                    likeButton.one("click", handler1);

                                });

                            </script>


                            <div class="post-share">
                                <ul>
                                    <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="blank" ><i class="ri-facebook-fill"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="blank"><i class="ri-twitter-x-line"></i></a></li>
                                    <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title() ;?>" target="blank"><i class="ri-reddit-line"></i></a></li>
                                    <li class="link"><a href="<?php the_permalink(); ?>" > <i class="ri-link"></i>  </a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="comment-area">
                        <?php comments_template() ;?>
                    </div>
                </div>

            </section>
            
            <?php 
            break;

    }

    ;?>

    <?php get_template_part('templates/parts/related', 'content'); ?>

</main>

<?php  get_footer() ;?>
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Horizon
 */

get_header();
?>

    <main>

        <section class="page-notfound">
            <div class="container">

                <h1>404</h1>
                <p><?php _e('Sorry, something went wrong.', 'textdomain'); ?></p>

                <div class="cta"><a href="<?php echo get_home_url(); ?>"><?php _e("Go Back Home", 'textdomain'); ?> <i class="ri-arrow-right-line"></i></a></div>
            </div>
        </section>
        
    </main>

<?php  
get_footer();
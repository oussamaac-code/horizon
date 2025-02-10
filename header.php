<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Horizon
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F39F5A">
    <title> <?php echo get_the_title() ;?> - Website Name</title>

    <?php wp_head() ;?>
</head>

<body <?php body_class() ;?>>
    


<header id="main-header">

    <div class="container">

        <!-- logo -->
        <div class="logo"> 

            <a href="<?php echo get_home_url() ;?>">
                <img src="<?php echo get_option('site_logo') ;?>" alt="logo">
            </a>

        </div>


        <!-- nav links -->
        <nav> 

            <?php  wp_nav_menu( [
                
                'theme_location' => 'header' ,
                'container' => false

            ]) ;?>

        </nav>

        
        <!-- header end -->
        <div class="end"> 
            
            <!-- search -->
            <?php
                if ( function_exists( '_depot_header_search_button' ) ) {
                    _depot_header_search_button();
                }
            ?>

            <!-- login -->
            <?php
                if ( function_exists( '_depot_header_login_button' ) ) {
                    _depot_header_login_button();
                }
            ?>


            <!-- cart -->

            <div class="mini-cart">
                <?php
                    if ( function_exists( 'horizon_woocommerce_header_cart' ) ) {
                        horizon_woocommerce_header_cart();
                    }
                ?>
            </div>

            <!-- burger menu -->

            <div class="burger-menu">
                <a href=""> <i class="ri-menu-line"></i> </a>
            </div>
            <script>
                jQuery(document).ready(function($){ 
                    
                    // Collapse ** Mobile menu **
                    $('header#main-header .burger-menu').on("click", function(e) {
                        e.preventDefault();
                        this.classList.toggle("active");
                        var content = $('header#main-header .mobile-menu');
                    
                        if (content.height()){
                            content.css('max-height', '0' )
                        }else{
                        
                            content.css('max-height', content.prop('scrollHeight') )
                        }
                    });

                })
            </script>

        </div>


        <!-- mobile menu -->
        <div class="mobile-menu">

            <div class="top">
                <a href="" class="close"><i class="ri-close-large-line"></i></a>
            </div>

             <?php  wp_nav_menu( [
                
                'theme_location' => 'header' ,
                'container' => false

            ]) ;?>

        </div>

    </div>

</header>


<?php 

get_template_part('templates/parts/site', 'loader');


if ( function_exists( '_depot_login_form' ) ) {
    _depot_login_form();
}
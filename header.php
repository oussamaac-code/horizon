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
    


<header>

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

        </div>


        <!-- mobile menu -->
        <div class="mobile-menu">

             <?php  wp_nav_menu( [
                
                'theme_location' => 'header' ,
                'container' => false

            ]) ;?>

        </div>

    </div>

</header>
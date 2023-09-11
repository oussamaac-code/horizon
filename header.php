<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php wp_head() ;?>
</head>

<body <?php body_class() ;?>>
    


<header>

    <div class="container">

        
        <div class="logo"> <!-- logo -->

            <a href="<?php echo get_home_url() ;?>">
            
                <img src="<?php ;?>" alt="logo">
            </a>

        </div>


        
        <nav> <!-- nav links -->

            <?php  wp_nav_menu( [
                
                'theme_location' => 'header' ,
                'container' => false

            ]) ;?>

        </nav>

        
        
        <div class="end"> <!-- header end -->

        </div>

    </div>

</header>
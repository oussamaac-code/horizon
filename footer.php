

<footer>

    <div class="container">

    
        <!-- logo -->
        <div class="logo"> 

            <a href="<?php echo get_home_url() ;?>">

                <img src="<?php ;?>" alt="logo">
            </a>

        </div>



        <?php  wp_nav_menu( [
                
            'theme_location' => 'footer' ,
            'container' => false

        ]) ;?>


        <!-- copyright -->
        <div class="copyright"> © 2023 Wildzoo. All Rights Reserved. </div>

    </div>

</footer>



<?php wp_footer() ;?>

</body>
</html>


<footer>

    <div class="container">


        <div class="logo"> <!-- logo -->

            <a href="<?php echo get_home_url() ;?>">

                <img src="<?php ;?>" alt="logo">
            </a>

        </div>



        <?php  wp_nav_menu( [
                
            'theme_location' => 'footer' ,
            'container' => false

        ]) ;?>


        <div class="copyright"> <!-- copyright -->
             © 2023 Wildzoo. All Rights Reserved.
        </div>

    </div>

</footer>



<?php wp_footer() ;?>

</body>
</html>
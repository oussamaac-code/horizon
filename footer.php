

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

    </div>

</footer>



<?php wp_footer() ;?>

</body>
</html>
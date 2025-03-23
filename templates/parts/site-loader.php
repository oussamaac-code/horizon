<?php 

$logo_white = get_theme_mod('horizon_header_logo');
$logo_dark  = get_theme_mod('horizon_header_logo_dark');

;?>
<div class="site-loader loader-show dark">
    <div class="loader-icon">
        <!-- dark -->
        <?php echo wp_get_attachment_image($logo_dark, 'medium') ;?> 
        <!-- white -->
        <?php echo wp_get_attachment_image($logo_white, 'medium') ;?> 
    </div>
    <div class="loader-bg"></div>
</div>

<script>
    jQuery(document).ready(function($){

        $('.site-loader').removeClass('loader-show')

        $(document).on("click", "a", function (e) {
        
            var linkClicked = $(this).attr('href');

            let pattern = /#.*/gm;
            let result = linkClicked.match(pattern);

            console.log('regex: '+result)

            if ( result==null && linkClicked!='#' && linkClicked!=undefined && linkClicked!=""){
                
                e.preventDefault();

                $('.site-loader').addClass('loader-show')
                window.setTimeout(function () {
                    
                    window.location = linkClicked;
                }, 1500);
            
                return false;
            }
        });

    })
</script>
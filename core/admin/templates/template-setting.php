<?php
/**
 * 
 * This is page admin dashboard
 * 
 * This file provide setting for your theme so users can change it in their choices
 * 
 * @package Horizon
 */

;?>
<form action="options.php" method="post">

    <?php settings_fields('wildzoo-setting-group') ;?>

    <div class="top-bar">
        <div class="row">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri() ;?>/asset/img/svg.svg">
            </div>
            <h1>Theme Settting</h1>
        </div>

        <div class="row">
            <?php submit_button() ;?>
        </div>
    </div>
    
    <section class="all-settings">
        <div class="container">

            <?php settings_errors() ;?>
            <div id="tabs">
    
                <!-- the tabs navigation -->
                <ul>
                    <li class="active"><button data-tab="#tabs-1">General</button></li>
                    <li><button data-tab="#tabs-2">Blog</button></li>
                    <li><button data-tab="#tabs-3">Coming</button></li>
                </ul>
    
                <!-- The tab widgets -->
                <div class="tabs-container">
                    
                    <div id="tabs-1" class="active" >
                        <h2>General Setting</h2>
                        <div class="tab-content">

                            <?php do_settings_fields('wildzoo-theme', 'wildzoo-general-options') ;?>
                        </div>
                       
                        <br>
                    </div>

                    <div id="tabs-2">
                        <h2>Blog Settings</h2>
                        <div class="tab-content">

                        </div>
                    </div>

                    <div id="tabs-3">
                        <h2>Comming Soon Page</h2>
                        <div class="tab-content">
                            <?php do_settings_fields('wildzoo-theme', 'wildzoo-comingsoon-options') ;?>
                        </div>

                    </div>

                </div>
    
            </div>
        </div>
    </section>
    
    <div class="footer">
        <div class="container">Copyright Wildzoo © 2023. All Rights Reserved.</div>
    </div>


</form>


<?php 

// ** @pachage Wildzoo
//


function wildzoo_add_admin_page(){
    

    // add menu page
    add_menu_page('Wildzoo Setting', 'WLd Theme', 'manage_options', 'wildzoo-theme', 'wildzoo_theme_dashboard_page', get_template_directory_uri().'/asset/img/icon.svg' , 4 );


    // add sub menu page
    add_submenu_page('wildzoo-theme', 'Wildzoo Setting', 'Dashboard', 'manage_options', 'wildzoo-theme', 'wildzoo_theme_dashboard_page' );
    add_submenu_page('wildzoo-theme', 'Wildzoo Theme Setting', 'Theme Settings', 'manage_options', 'wildzoo-theme-setting', 'wildzoo_theme_settings_page' );

    // add custom setting
    add_action('admin_init', 'wildzoo_custom_setting');
    
}

add_action('admin_menu', 'wildzoo_add_admin_page');



// functions pages

function wildzoo_theme_dashboard_page(){

    get_template_part('core/admin/templates/template', 'dashboard');
}

function wildzoo_theme_settings_page(){

    get_template_part('core/admin/templates/template', 'setting');
}

// functions settings

function wildzoo_custom_setting(){

    register_setting('wildzoo-setting-group', 'site_name');
    register_setting('wildzoo-setting-group', 'site_logo');
    register_setting('wildzoo-setting-group', 'facebook_account');
    register_setting('wildzoo-setting-group', 'instagram_account');
    register_setting('wildzoo-setting-group', 'video_background');
    register_setting('wildzoo-setting-group', 'newsletter_popup');

    add_settings_section('wildzoo-general-options', 'General Setting', 'wildzoo_general_options', 'wildzoo-theme');
    add_settings_section('wildzoo-comingsoon-options', 'Comming Soon Page', 'wildzoo_coming_options', 'wildzoo-theme');

    add_settings_field('site-name', 'Site Name', 'wildzoo_site_name', 'wildzoo-theme', 'wildzoo-general-options');
    add_settings_field('site-logo', 'Site Logo', 'wildzoo_site_logo', 'wildzoo-theme', 'wildzoo-general-options');
    add_settings_field('facebook-account', 'Facebook', 'wildzoo_site_facebook', 'wildzoo-theme', 'wildzoo-general-options');
    add_settings_field('instagram-account', 'Instagram', 'wildzoo_site_instagram', 'wildzoo-theme', 'wildzoo-general-options');
    add_settings_field('newsletter-popup', 'Newsletter Popup', 'wildzoo_newsletter_popup', 'wildzoo-theme', 'wildzoo-general-options');

    add_settings_field('background-video', 'Video Background', 'wildzoo_video_bg', 'wildzoo-theme','wildzoo-comingsoon-options' );

}

function wildzoo_general_options(){

   // echo 'General Setting';

}

function wildzoo_site_name(){

    $siteName= esc_attr(get_option('site_name')) ;
    echo '<div>';
    echo '<input type="text" name="site_name" value="'.$siteName.'" placeholder="Site name" />';
    //echo '<label class="switch"><input type="checkbox"><span class="slider round"></span></label>';
    echo '</div>';
   
}
function wildzoo_site_facebook(){
   
    $facebook= esc_attr(get_option('facebook_account')) ;
    echo '<div>';
    echo '<input type="text" name="facebook_account" value="'.$facebook.'" placeholder="Facebook url" /> ';

    if(empty($instagram)){  echo '</div>' ; return ;}
    echo '<a target="_blank" href="'.$facebook.'" style="margin-left: 10px;"> Visit <i class="ri-external-link-line"></i> </a>';
    echo '</div>';
}
function wildzoo_site_instagram(){
   
    $instagram= esc_attr(get_option('instagram_account')) ;
    echo '<div>';
    echo '<input type="text" name="instagram_account" value="'.$instagram.'" placeholder="Instagram url" /> ';
    if(empty($instagram)){  echo '</div>' ; return ;}
    echo '<a target="_blank" href="'.$instagram.'" style="margin-left: 10px;"> Visit <i class="ri-external-link-line"></i></a>';
    echo '</div>';
}
function wildzoo_site_logo(){
    $img= esc_attr(get_option('site_logo')) ;
    echo '<div>';
    echo '<input type="hidden" id="site-logo-img" name="site_logo" value="'.$img.'"/> ';
    echo '<input type="button" class="button button-secondary" value="Add logo" id="upload-button"/> ';
    echo '<img style="margin-left: 10px; max-width:7rem;" src="'.$img.'" id="logo-site-display"> ';
    echo '</div>';
}
function wildzoo_newsletter_popup(){
    $popup= esc_attr(get_option('newsletter_popup'));
    echo '<div>';
    $checked= ($popup == 1 ? 'checked' : '');
    echo '<label class="switch"><input type="checkbox" name="newsletter_popup" value="1" '.$checked.'><span class="slider round"></span></label>';
    echo '</div>';
}
function wildzoo_coming_options(){ 

}
function wildzoo_video_bg(){
    $video= esc_attr(get_option('video_background')) ;
    echo '<div>';
    echo '<input type="hidden" id="coming-video" name="video_background" value="'.$video.'"/> ';
    echo '<input style="margin-right: 10px;" type="text" id="coming_soon_bg" name="video_background" value="'.$video.'" placeholder="Video link" />';
    echo '<input type="button" class="button button-secondary" value="Add video" id="upload-button-video"/> ';
    echo '<div>';
}


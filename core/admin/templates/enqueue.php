<?php 

// ** @pachage Wildzoo

// =============== admin enqueue function ===============

function wildzoo_load_admin_scripts($hook){

    if( $hook != 'wld-theme_page_wildzoo-theme-setting' && $hook != 'toplevel_page_wildzoo-theme'){ return; }

     // enqueue styles
    wp_register_style('wildzoo_admin', get_template_directory_uri().'/core/admin/css/edit.css', array(), '1.0.0', 'all');
    wp_register_style( 'remixicon', get_template_directory_uri() . '/asset/fonts/remixicon.css',array(),'1.1','all');
    wp_enqueue_style('wildzoo_admin');
    wp_enqueue_style('remixicon');
    
    // wp media
    wp_enqueue_media();
    
    // enqueue scripts
    wp_register_script('wildzoo_admin_script', get_template_directory_uri().'/core/admin/js/theme_admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('wildzoo_admin_script');
    wp_enqueue_script('');


}

add_action('admin_enqueue_scripts','wildzoo_load_admin_scripts');
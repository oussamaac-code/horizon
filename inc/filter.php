<?php
/**
 * This file contains all the filters of your theme
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Horizon
 */


/**
 * 
 * Remove parenthese from widget categories
 */

add_filter('wp_list_categories','categories_postcount_filter');

function categories_postcount_filter ($variable) {

    $variable = str_replace('(', '<span class="post_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
 }


/**
 * 
 * Remove pre text archive title
 */

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

function my_theme_archive_title( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
 
	return $title;
}

/**
 * 
 * Change comment date format (Comment)
 */

add_filter( 'get_comment_date', 'wpse_comment_date_18350375' ); 

function wpse_comment_date_18350375( $date ) {

   $date = date("j M Y ");   
   return $date;
}
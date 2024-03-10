<?php 
/**
 * The template for displaying search Form pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Horizon
 */

;?>
<form action="/" method="get">

    <input type="text" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php _e( 'Search here..', 'textdomain' ); ?>" >
    <button type="submit"><i class="ri-search-line"></i></button>
    
</form>
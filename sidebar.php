<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Horizon
 */

if ( is_product() ||  is_shop() || is_product_category() || is_product_tag() || is_cart() || is_checkout() ): 

	if ( is_active_sidebar( 'shop' ) ) : 
		;?>
		<aside id="secondary" class="widget-area">
			<div class="top-sidebar">
				<span class="title"><?php _e('Filtrer', 'textdomain'); ?></span>
				<span class="close-button"> <a href=""><i class="ri-close-line"></i></a></span>
			</div>
			<?php dynamic_sidebar( 'shop' ); ?>
		</aside>
		<?php
	
	else:

		return;
	endif;

else:

	if ( is_active_sidebar( 'blog' ) ) : 
		;?>
		<aside>
			<?php dynamic_sidebar( 'blog' ); ?>
		</aside>
		<?php
	else:
		return;
	endif;

endif;


?>

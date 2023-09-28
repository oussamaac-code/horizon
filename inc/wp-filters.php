
<?php

//========================== remove parenthese from widget categories =================================

add_filter('wp_list_categories','categories_postcount_filter');

function categories_postcount_filter ($variable) {

    $variable = str_replace('(', '<span class="post_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
 }


//========================== remove pre text archive title =================================

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


//========================== Comment Form Placeholder Author, Email, URL (Comment) =================================

add_filter( 'comment_form_default_fields', 'sabretooth_comment_placeholders' );

function sabretooth_comment_placeholders( $fields ) {
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="Full Name"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="Email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="Website"',
        $fields['url']
    );
    return $fields;
}
  

//========================== Add Placehoder in comment Form Textarea (Comment) =================================

add_filter( 'comment_form_defaults', 'sabretooth_textarea_placeholder' );
  
function sabretooth_textarea_placeholder( $fields ) {

    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="Comment"',
        $fields['comment_field']
    );

	return $fields;
}


//========================== change comment date format (Comment) =================================

add_filter( 'get_comment_date', 'wpse_comment_date_18350375' ); 

function wpse_comment_date_18350375( $date ) {

   $date = date("j M Y ");   
   return $date;
}
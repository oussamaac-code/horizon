
<?php

//========================== remove parenthese from widget categories =================================

function categories_postcount_filter ($variable) {

    $variable = str_replace('(', '<span class="post_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
 }

add_filter('wp_list_categories','categories_postcount_filter');
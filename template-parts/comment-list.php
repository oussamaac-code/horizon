

<?php

$comments = array_reverse(get_comments()) ;



foreach( $comments as $comment ){

    $parent  = $comment->comment_parent;
    $author  = $comment->comment_author;
    $id      = $comment->comment_ID;
    $email   = $comment->comment_author_email;
    $date    = date_create($comment->comment_date);
    $content = $comment->comment_content;
    $url     = $comment->comment_author_url;
    


    if($parent==0){ ;?>
    
        <li id="comment-<?php echo $id ;?>"> 

            <div class="comment_body">

                <div class="comment-author-avatar"> <?php echo get_avatar($email) ;?> </div>

                <div class="comment-content">
                    
                    <?php if( !empty($url)){ ;?> <h6 class="comment_author"><a href="<?php echo $url ;?>"><?php echo $author ;?></a></h6><?php }else{ ;?> <h6 class="comment_author"><?php echo $author ;?></h6><?php  } ;?>
                    <div class="comment_date"><?php echo date_format($date,"j M Y h:i A"); ;?></div>
                    <div class="comment-text"> <p><?php echo $content ;?></p> </div>
                    <span class="reply"> <?php  comment_reply_link( ['add_below'=> $id, 'reply_text'=> 'Reply','depth' => 1, 'max_depth' => 2,],$id);?></span>

                </div>
            </div>

            <ul class="children">
                        
                <?php foreach($comments as $comment){

                    $email   = $comment->comment_author_email;
                    $author  = $comment->comment_author;
                    $email   = $comment->comment_author_email;
                    $content = $comment->comment_content;
                    $parent  = $comment->comment_parent;
                    $date    = date_create($comment->comment_date);
                    $url     = $comment->comment_author_url;
                    

                    if ( $parent == $id ){ ;?>

                        <li>
                            <div class="comment_body">

                                <div class="comment-author-avatar"> <?php echo get_avatar($email) ;?> </div>

                                <div class="comment-content">
                                    
                                    <?php if( !empty($url)){ ;?> <h6 class="comment_author"><a href="<?php echo $url ;?>"><?php echo $author ;?></a></h6><?php }else{ ;?> <h6 class="comment_author"><?php echo $author ;?></h6><?php  } ;?>
                                    <div class="comment_date"><?php echo date_format($date,"j M Y h:i A"); ;?></div>
                                    <div class="comment-text"> <p><?php echo $content ;?></p> </div>
                                    <span class="reply"> <?php  comment_reply_link( ['add_below'=> $id, 'reply_text'=> 'Reply','depth' => 1, 'max_depth' => 2,],$id);?></span>
                                   
                                </div>

                            </div>
                        </li>                  

                    <?php }

                } ;?>

            </ul>   

        </li>

    <?php }
} 
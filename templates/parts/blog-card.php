<div class="blog-card">
    <div class="content">
        
        <a href="<?php the_permalink(); ?>"> 
            <div class="content-img">
                <?php the_post_thumbnail('large'); ?>
            </div>

            <div class="content-info">
                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M, Y'); ?></time>
                <h3> <?php the_title();?> </h3>
            </div>

        </a>

    </div>
</div>





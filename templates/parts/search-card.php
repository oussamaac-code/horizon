<div class="search-card">
    <div class="search-content">
        <a href="<?php the_permalink(); ?>">
            <div class="img">
                <?php the_post_thumbnail('medium'); ?>
            </div>
            <div class="info">
                <h5><?php the_title(); ?></h5>
                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M, Y'); ?></time>
            </div>
        </a>
    </div>
</div>
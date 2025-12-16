<?php 
    global $post;
?>
<a href="<?php the_permalink() ?>" class="person">
    <div class="thumb thumb-45">
        <div class="img-holder">
            <?php the_post_thumbnail('medium_large') ?>
        </div>
    </div>
    <div class="info">
        <span class="name"><?php the_title() ?></span>
        <div class="pos"><?php echo the_field('doingu_pos') ?></div>
    </div>
</a>
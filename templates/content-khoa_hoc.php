<a href="<?php the_permalink() ?>" class="course post">
    <div class="thumb thumb-11">
        <div class="img-holder">
            <?php the_post_thumbnail() ?>
        </div>
    </div>
    <h3 class="title"><?php the_title() ?></h3>
    <?php the_excerpt() ?>
</a>
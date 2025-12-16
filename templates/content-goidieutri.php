<?php
global $post;
?>
<div class="cure cure-item">
    <a href="<?php the_permalink() ?>" class="cure-thumb thumb-21" aria-label="<?php the_title() ?>">
        <div class="img-holder">
            <?php the_post_thumbnail('medium', array('loading' => 'lazy')) ?>
        </div>
    </a>
    <div class="info-box">
        <h3 class="cure-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <?php 
            if(get_field('pricing')) :
                $price = get_field('pricing');
                if(isset($price['amount']) && is_numeric($price['amount'])) :
        ?>
        <div class="price">
            <span class="price-value"><?php echo number_format($price['amount'], 0, ',', '.') ?>đ</span>
            <span class="price-separator">/</span>
            <span class="price-unit"><?php echo $price['unit'] ?></span>
        </div>
        <?php endif; endif; ?>
    </div>
</div>
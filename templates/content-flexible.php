<?php 
    if(have_rows('page_content')) : 
        while(have_rows('page_content')) : the_row();
            if( get_row_layout() == 'slider_content' ): 
                $images = get_sub_field('images');
                if($images) :
?>
<div class="page-slider">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach($images as $img) : ?>
            <div class="swiper-slide">
                <div class="img-holder">
                    <?php echo wp_get_attachment_image($img, 'large', false, array()) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; endif; ?>
<?php if( get_row_layout() == 'text_content' ) : ?>
    <section class="section">
        <div class="wrapper">
            <?php if(get_sub_field('title')) : ?>
            <div class="section-title">
                <h2 class="entry-title">
                    <?php the_sub_field('title') ?>
                </h2>
                <div class="icon">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                </div>
            </div>
            <?php endif; ?>
            <div class="section-content entry-content">
                <?php the_sub_field('content') ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(get_row_layout() == 'featured_content') : ?>
    <div class="page-features section">
        <div class="wrapper">
            <?php if(get_sub_field('title')) : ?>
            <section class="section-title">
                <h2><?php the_sub_field('title') ?></h2>
                <div class="icon">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                </div>
            </section>
            <?php endif; ?>
            <?php 
                if(get_sub_field('features')) : 
                    $features = get_sub_field('features');
            ?>
            <div class="features">
                <?php foreach($features as $item) : ?>
                <div class="item">
                    <div class="icon">
                        <?php 
                            $img = $item['icon'];
                            echo wp_get_attachment_image($img, 'full', false, array('alt'=>$item['title']));
                        ?>
                    </div>
                    <div class="content">
                        <h3><?php echo $item['title'] ?></h3>
                        <p><?php echo $item['content'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php endwhile; endif; ?>
<?php 
    if(have_rows('home_reviews')) :
?>
<section class="section" id="reviews">
    <div class="wrapper">
        <?php if(get_field('home_reviews_title')) : ?>
        <div class="section-title">
            <h2><?php the_field('home_reviews_title') ?></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_reviews_content')) : ?>
        <div class="section-des">
            <?php the_field('home_reviews_content') ?>
        </div>
        <?php endif; ?>
        <div class="section-content">
            <div class="reviews reviews-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while(have_rows('home_reviews')) : the_row(); ?>
                        <div class="swiper-slide">
                            <div class="review">
                                <div class="content">
                                    <?php the_sub_field('content') ?>
                                </div>
                                <div class="name">
                                    <?php if(get_sub_field('name')) : ?>
                                        <span><?php the_sub_field('name') ?></span>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('pos')) : ?>
                                    <span class="sep">|</span><span><?php the_sub_field('pos') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
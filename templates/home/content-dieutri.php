<?php 
    $goidieutri = get_field('home_goidieutri');
    if($goidieutri) :
?>
<section class="section home-section" id="goidieutri">
    <div class="wrapper">
        <?php if(get_field('home_goidieutri_title')) : ?>
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_goidieutri_url') ? get_field('home_goidieutri_url') : '#goidieutri' ?>"><?php the_field('home_goidieutri_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_goidieutri_content')) : ?>
        <div class="section-des">
            <?php the_field('home_goidieutri_content') ?>
        </div>
        <?php endif; ?>
        <div class="cures cure-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach($goidieutri as $post) : setup_postdata($post); ?>
                    <div class="swiper-slide">
                        <?php get_template_part('templates/content', 'goidieutri') ?>
                    </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-nav">
                <button class="swiper-button-next swiper-btn"></button>
                <button class="swiper-button-prev swiper-btn"></button>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
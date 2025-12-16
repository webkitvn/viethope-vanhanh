<?php 
    $doingubs = get_field('home_doingubs');
    if($doingubs) :
        $bg = get_field('home_doingubs_bg');
?>
<section class="section home-section section-white" id="doingu">
    <div class="section-bg">
        <div class="img-holder">
            <?php echo wp_get_attachment_image($bg, 'full', false, array()) ?>
        </div>
    </div>
    <div class="wrapper">
        <?php if(get_field('home_doingubs_title')) : ?>
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_doingubs_url') ? the_field('home_doingubs_url') : '#doingu' ?>"><?php the_field('home_doingubs_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon-white.svg" alt="van hanh" loading="lazy">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_doingubs_content')) : ?>
        <div class="section-des">
            <?php the_field('home_doingubs_content') ?>
        </div>
        <?php endif; ?>
        <div class="doingubs doingubs-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php 
                        foreach($doingubs as $post) : setup_postdata( $post );
                    ?>
                    <div class="swiper-slide">
                        <?php get_template_part('templates/content', 'bs') ?>
                    </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
    $dmdieutri = get_field('home_dmdieutri');
    if($dmdieutri) :
?>
<section class="section home-section" id="dmdieutri">
    <div class="wrapper">
        <?php if(get_field('home_dmdieutri_title')) : ?>
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_dmdieutri_url') ? get_field('home_dmdieutri_url') : '#' ?>"><?php the_field('home_dmdieutri_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_dmdieutri_content')) : ?>
        <div class="section-des">
            <?php the_field('home_dmdieutri_content') ?>
        </div>
        <?php endif; ?>
        <div class="cures cure-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach($dmdieutri as $term) : ?>
                    <div class="swiper-slide">
                        <div class="cure">
                            <a href="<?php echo get_term_link($term->term_id, 'dm_dieu_tri') ?>" class="cure-thumb thumb thumb-11">
                                <div class="img-holder">
                                    <?php 
                                        $img = get_field('dmdt_image', $term);
                                        echo wp_get_attachment_image($img, 'large', false, array());
                                    ?>
                                </div>
                            </a>
                            <h3 class="cure-title"><a href="<?php echo get_term_link($term->term_id, 'dm_dieu_tri') ?>"><?php echo $term->name ?></a></h3>
                            <p><?php echo substr(strip_tags(term_description($term)), 0, 150) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
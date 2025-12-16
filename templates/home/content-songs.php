<?php 
    if(have_rows('home_songs')) :
?>

<section class="section home-section" id="amnhac">
    <div class="wrapper">
        <?php if(get_field('home_music_title')) : ?>
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_music_url') ? get_field('home_music_url') : '#amnhac' ?>"><?php the_field('home_music_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_music_content')) : ?>
        <div class="section-des">
            <?php the_field('home_music_content') ?>
        </div>
        <?php endif; ?>
        <div class="media cure-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php while(have_rows('home_songs')) : the_row(); ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="thumb thumb-11">
                                <a href="<?php the_sub_field('link') ?>" class="img-holder" aria-label="<?php the_sub_field('title') ?>" data-fancybox="song-gallery" data-src="<?php the_sub_field('link') ?>">
                                    <?php 
                                        $img = get_sub_field('image');
                                        echo wp_get_attachment_image($img, 'large', false, array());
                                    ?>
                                    <span class="play">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-play fa-w-14 fa-3x"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" class=""></path></svg>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title"><a href="#"><?php the_sub_field('title') ?></a></h3>
                        </div>
                    </div>
                    <?php endwhile; ?>
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
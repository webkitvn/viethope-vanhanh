<?php
    if(have_rows('home_banners')) :
?>
<section id="banner">
    <div class="swiper banner-slider">
        <div class="swiper-wrapper">
            <?php
                while(have_rows('home_banners')) : the_row();
                $d_img = get_sub_field('d_image');
                $m_img = get_sub_field('m_image');
                $content = get_sub_field('content');
                $button = get_sub_field('button');
            ?>
            <div class="swiper-slide">
                <div class="banner">
                    <?php 
                        if(!empty($button && $button['url'])) :
                            echo '<a href="'.$button['url'].'" class="">';
                    ?>
                    <div class="banner-img">
                        <picture>
                            <source media="(max-width: 799px)" srcset="<?php echo wp_get_attachment_image_url( $m_img, 'full', false ) ?>">
                            <source media="(min-width: 800px)" srcset="<?php echo wp_get_attachment_image_url( $d_img, 'full', false ) ?>">
                            <?php echo wp_get_attachment_image($d_img, 'full', false, array()) ?>
                        </picture>
                    </div>
                    <div class="wrapper">
                        <div class="text-box">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <?php
                        echo '</a>';
                        endif;
                    ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-nav">
            <button class="swiper-button-next swiper-btn"></button>
            <button class="swiper-button-prev swiper-btn"></button>
        </div>
    </div>
    
    <?php if(have_rows('home_banners_info')) : ?>
    <div class="banner-bottom">
        <?php while(have_rows('home_banners_info')) : the_row(); ?>
        <div class="item">
            <span><?php the_sub_field('text_1') ?></span>
            <span><?php the_sub_field('text_2') ?></span>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>
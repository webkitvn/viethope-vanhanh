<?php get_header() ?>
<?php get_template_part('templates/content','page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content section">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">
                        <?php the_title() ?>
                    </h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="section-content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php 
            $query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 20,
                'post__not_in' => array($post->ID),
                'no_found_rows' => 1,
                'orderby' => 'rand'
            ));
            if($query->have_posts()) :
        ?>
        <div class="page-features section pt-4">
            <div class="wrapper">
                <section class="section-title">
                    <h2><?php _e("Tin tức khác", "vanhanh") ?></h2>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </section>
                <div class="section-content">
                    <div class="courses posts courses-slider swiper-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php while($query->have_posts()) : $query->the_post(); ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink() ?>" class="course post">
                                        <div class="thumb thumb-11">
                                            <div class="img-holder">
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                        </div>
                                        <h3 class="title"><?php the_title() ?></h3>
                                        <?php the_excerpt() ?>
                                    </a>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <button class="swiper-button-next swiper-btn"></button>
                            <button class="swiper-button-prev swiper-btn"></button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; wp_reset_query() ?>
    </div>
</div>
<?php get_footer() ?>
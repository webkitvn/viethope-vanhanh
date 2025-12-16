<?php get_header() ?>
<?php get_template_part('templates/content','page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content section">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">
                        <?php single_cat_title() ?>
                    </h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="section-content">
                    <div class="posts posts-grid">
                        <?php while(have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink() ?>" class="post" aria-label="">
                            <div class="thumb thumb-11">
                                <div class="date"><span><?php the_time('M') ?></span><span><?php the_time('d') ?></span></div>
                                <div class="img-holder">
                                    <?php the_post_thumbnail() ?>
                                </div>
                            </div>
                            <h3 class="title"><?php the_title() ?></h3>
                            <?php the_excerpt() ?>
                        </a>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_pagenavi() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
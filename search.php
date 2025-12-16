<?php get_header() ?>
<div id="main-content">
    <div class="page-content">
        <?php //get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content section">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">
                        <?php _e("Kết quả tìm kiếm cho: ") ?> <span><?php echo get_search_query() ?></span>
                    </h1>
                </div>
                <div class="section-content">
                    <div class="posts results">
                        <?php while(have_posts()) : the_post(); ?>
                        <div class="post">
                            <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                            <?php the_excerpt() ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_pagenavi() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
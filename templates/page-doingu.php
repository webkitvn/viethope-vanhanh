<?php /* Template name: Đội ngũ */ ?>
<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
    </div>
    <?php 
        $terms = get_terms(array(
            'taxonomy' => 'doingubs_cat',
            'orderby' => 'menu_order'
        ));
        if($terms) :
            foreach($terms as $term) :
                $query = new WP_Query(array(
                    'post_type' => 'doingubs',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'doingubs_cat',
                            'field' => 'id',
                            'terms' => $term->term_id
                        )
                    )
                ));
                if($query->have_posts()) :
    ?>
    <section class="section doingu">
        <div class="wrapper">
            <div class="section-title">
                <h1 class="entry-title"><?php echo $term->name ?></h1>
                <div class="icon">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                </div>
            </div>
            <div class="section-content">
                <div class="doingubs col2 doingubs-grid">
                    <?php 
                        while($query->have_posts()) : $query->the_post();
                    ?>
                    <?php get_template_part('templates/content', 'bs') ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; endforeach; endif; ?>
</div>
<?php get_footer() ?>
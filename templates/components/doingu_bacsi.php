<?php 
    $doingu_bacsi = [];
    if(get_query_var('taxonomy') == 'dm_chuyen_khoa') {
        $term = get_queried_object();
        $doingu_bacsi = get_field('doingu_bacsi', $term);
    }
    if(is_singular('chuyen_khoa')) {
        $post = get_post();
        $doingu_bacsi = get_field('doingu_bacsi', $post);
    }
?>
<?php if($doingu_bacsi) : 
    $query = new WP_Query(array(
        'post_type' => 'doingubs',
        'posts_per_page' => -1,
        'post__in' => $doingu_bacsi,
    ));
?>
<section class="section">
    <div class="wrapper">
        <div class="section-title">
            <h2><?php _e("Đội ngũ bác sĩ", "vanhanh") ?></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy"
                    width="20" height="20">
            </div>
        </div>
        <div class="section-content">
            <div class="doctors doctors-grid">
                <?php while($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('templates/components/bacsi', 'card') ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
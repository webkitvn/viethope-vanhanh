<?php
$is_dm_chuyen_khoa_tax = is_tax( 'dm_chuyen_khoa' );
$current_term          = $is_dm_chuyen_khoa_tax ? get_queried_object() : null;

if ( $is_dm_chuyen_khoa_tax && $current_term instanceof WP_Term ) {
    $page_title = single_term_title( '', false );
} else {
    $page_title = __( 'Chuyên khoa', 'vanhanh' );
}

$parent_term_id = 0;

if ( $current_term instanceof WP_Term ) {
    $parent_term_id = $current_term->term_id;
}

$terms = vh_get_dm_chuyen_khoa_terms( $parent_term_id );

if ( $is_dm_chuyen_khoa_tax ) {
    $section_description = term_description();
} else {
    $section_description = get_field( 'dmdieutri_content', 'option' );
}
?>
<?php get_header() ?>
    <?php get_template_part('templates/content','page-header') ?>
    <div id="main-content">
        <div class="page-content">
            <?php get_template_part('templates/content', 'breadcrumbs') ?>
            <div class="entry-content section">
                <div class="wrapper">
                    <div class="section-title">
                        <h1 class="entry-title">
                            <?php echo esc_html( $page_title ); ?>
                        </h1>
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="wrapper">
                    <?php if ( ! empty( $terms ) ) : ?>
                    <div class="cures cures-grid dmdieutri">
                        <?php
                        foreach ( $terms as $term ) :
                            set_query_var( 'vh_chuyen_khoa_term', $term );
                            get_template_part( 'templates/components/chuyen_khoa', 'card' );
                        endforeach;
                        ?>
                    </div>
                    <?php else : ?>
                        <div class="cures cures-grid">
                        <?php 
                            while(have_posts()) : the_post();
                                get_template_part('templates/content', 'goidieutri');
                            endwhile; 
                        ?>
                        </div>
                        <?php wp_pagenavi() ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="entry-content section">
                <div class="wrapper">
                    <div class="section-des">
                        <?php 
                        if ( $section_description ) {
                            echo $section_description;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
                get_template_part('templates/components/doingu_bacsi');
            ?>
        </div>
    </div>
<?php get_footer() ?>
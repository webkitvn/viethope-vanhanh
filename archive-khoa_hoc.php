<?php get_header() ?>
    <?php get_template_part('templates/content','page-header') ?>
    <div id="main-content">
        <div class="page-content">
            <?php get_template_part('templates/content', 'breadcrumbs') ?>
            <div class="entry-content section">
                <div class="wrapper">
                    <div class="section-title">
                        <h1 class="entry-title">
                            <?php 
                                if(is_tax('dm_khoa_hoc')){
                                    single_cat_title();
                                }
                                else{
                                    _e("Khóa học", "vanhanh");
                                }
                            ?>
                        </h1>
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                if(is_tax('dm_khoa_hoc')){
                    $termID = get_queried_object()->term_id;
                    $terms = get_terms(array(
                        'taxonomy' => 'dm_khoa_hoc',
                        'hide_empty' => false,
                        'parent' => $termID,
                        'orderby' => 'menu_order'
                    ));
                }
                else{
                    $terms = get_terms(array(
                        'taxonomy' => 'dm_khoa_hoc',
                        'hide_empty' => false,
                        'parent' => 0,
                        'orderby' => 'menu_order'
                    ));
                }
            ?>
            <div class="section">
                <div class="wrapper">
                    <?php if($terms) : ?>
                    <div class="cures cures-grid dmdieutri">
                        <?php 
                            foreach($terms as $term) :
                        ?>
                        <div class="cure">
                            <a href="<?php echo get_term_link($term->term_id, 'dm_khoa_hoc') ?>" class="cure-thumb thumb thumb-11">
                                <div class="img-holder">
                                    <?php 
                                        $img = get_field('dmdt_image', $term);
                                        echo wp_get_attachment_image($img, 'large', false, array());
                                    ?>
                                </div>
                            </a>
                            <h3 class="cure-title"><a href="<?php echo get_term_link($term->term_id, 'dm_khoa_hoc') ?>"><?php echo $term->name ?></a></h3>
                            <p><?php echo substr(strip_tags(term_description($term)), 0, 150) ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else : ?>
                        <div class="courses posts">
                        <?php 
                            while(have_posts()) : the_post();
                                get_template_part('templates/content', 'khoa-hoc');
                            endwhile; 
                        ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>
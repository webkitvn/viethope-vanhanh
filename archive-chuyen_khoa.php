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
                                if(is_tax('dm_chuyen_khoa')){
                                    single_cat_title();
                                }
                                else{
                                    _e("Chuyên khoa", "vanhanh");
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
                if(is_tax('dm_chuyen_khoa')){
                    $termID = get_queried_object()->term_id;
                    $terms = get_terms(array(
                        'taxonomy' => 'dm_chuyen_khoa',
                        'hide_empty' => false,
                        'parent' => $termID,
                        'orderby' => 'menu_order'
                    ));
                }
                else{
                    $terms = get_terms(array(
                        'taxonomy' => 'dm_chuyen_khoa',
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
                            <a href="<?php echo get_term_link($term->term_id, 'dm_chuyen_khoa') ?>" class="cure-thumb thumb thumb-11">
                                <div class="img-holder">
                                    <?php 
                                        $img = get_field('dmdt_image', $term);
                                        echo wp_get_attachment_image($img, 'large', false, array());
                                    ?>
                                </div>
                            </a>
                            <div class="info-box">
                                <h3 class="cure-title"><a href="<?php echo get_term_link($term->term_id, 'dm_chuyen_khoa') ?>"><?php echo $term->name ?></a></h3>
                                <p><?php echo substr(strip_tags(term_description($term)), 0, 150) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                            if(is_tax('dm_chuyen_khoa')){
                                echo term_description();
                            }
                            else{
                                the_field('dmdieutri_content', 'option');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>
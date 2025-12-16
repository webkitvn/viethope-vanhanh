<?php get_header() ?>
    <?php get_template_part('templates/content','page-header') ?>
    <div id="main-content">
        <div class="page-content">
            <?php get_template_part('templates/content', 'breadcrumbs') ?>
            <div class="entry-content section">
                <div class="wrapper">
                    <div class="section-title">
                        <h1 class="entry-title">
                            <?php _e("Liệu pháp y học bổ sung", "vanhanh") ?>
                        </h1>
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                        </div>
                    </div>
                    <div class="section-des">
                        <?php 
                            the_field('lieuphapyhoc_content', 'option');
                        ?>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="wrapper">
                    <div class="cures cures-grid">
                    <?php 
                        while(have_posts()) : the_post();
                            get_template_part('templates/content', 'goidieutri');
                        endwhile; 
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>
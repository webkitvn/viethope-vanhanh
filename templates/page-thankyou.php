<?php /* Template Name: Thank you */ ?>
<?php get_header() ?>
    <div id="main-content">
        <div class="page-content">
            <section class="section">
                <div class="wrapper">
                    <div class="section-title">
                        <h1 class="entry-title"><?php the_title() ?></h1>
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                        </div>
                    </div>
                    <div class="section-content entry-content">
                        <?php the_content() ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php get_footer() ?>
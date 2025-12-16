<?php /* Template name: Giới thiệu */ ?>
<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="content entry-content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php get_template_part('templates/content', 'flexible') ?>
    </div>
</div>
<?php get_footer() ?>
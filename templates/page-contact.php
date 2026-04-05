<?php /* Template name: Liên hệ */ ?>
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
            </div>
        </div>
        <?php if(get_field('map_iframe')) : 
            $map_iframe = get_field('map_iframe');
            $map_iframe = str_replace('width="100%"', 'width="100%" height="450"', $map_iframe);
        ?>
        <div class="map section" id="map">
            <div class="frame-holder">
                <?php echo $map_iframe ?>
            </div>
            <div class="wrapper">
                <div class="contact-info">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="form-section section">
            <div class="wrapper">
                <div class="form">
                    <?php echo do_shortcode('[contact-form-7 id="64" title="Liên hệ"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
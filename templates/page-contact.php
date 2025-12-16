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
        <div class="map section" id="map">
            <div class="frame-holder">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.078914762628!2d106.68340146461708!3d10.784500283908471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2c1f141acb%3A0x43b317fc175831ce!2zVHJ1bmcgdMOibSB5IGtob2EgVuG6oW4gSOG6oW5o!5e0!3m2!1svi!2s!4v1636369107152!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="wrapper">
                <div class="contact-info">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
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
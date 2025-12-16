<?php /* Template name: Home page */ ?>
<?php get_header() ?>
<div id="main-content">
    <?php get_template_part('templates/home/content', 'banner') ?>
    <?php get_template_part('templates/home/content', 'about') ?>
    <?php //get_template_part('templates/home/content', 'dieutri') ?>
    <?php get_template_part('templates/home/content', 'doingu') ?>
    <?php get_template_part('templates/home/content', 'dmdieutri') ?>
    <?php get_template_part('templates/home/content', 'tintuc') ?>
    <?php get_template_part('templates/home/content', 'songs') ?>
    <?php get_template_part('templates/home/content', 'videos') ?>
    <?php get_template_part('templates/home/content', 'reviews') ?>
</div>
<?php get_footer() ?>
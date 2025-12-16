<?php /* Template name: Blank page */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <meta name="facebook-domain-verification" content="vjyntf341xe5k4beaw4jgzl67jeoyo" />
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open() ?>
        <?php while(have_posts()) : the_post(); ?>
        <div id="main-content">
            <div class="page-content">
                <?php the_content() ?>
            </div>
        </div>
        <?php endwhile; ?>
    <?php wp_footer() ?>
</body>
</html>
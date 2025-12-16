<?php 
    $dmtintuc = get_field('home_dmtintuc');
    if($dmtintuc) :
?>

<section class="section" id="tintuc">
    <div class="wrapper">
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_tintuc_url') ? get_field('home_tintuc_url') : '#tintuc' ?>"><?php the_field('home_tintuc_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <div class="tabs-wrapper">
            <?php if(count($dmtintuc) > 1) : ?>
            <ul class="tabs">
                <?php $i = 1; foreach($dmtintuc as $cat) : ?>
                <li class="<?php echo $i == 1 ? 'active' : '' ?>"><a href="#<?php echo $cat->slug ?>"><?php echo $cat->name ?></a></li>
                <?php $i++; endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="tab-content">
                <?php 
                    $i = 1; 
                    foreach($dmtintuc as $cat) : 
                        $query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'cat' => $cat->term_id,
                            'no_found_rows' => 1
                        ));
                        if($query->have_posts()) :
                ?>
                <div class="panel <?php echo $i == 1 ? 'active' : '' ?>" id="<?php echo $cat->slug ?>">
                    <div class="posts home-posts">
                        <?php while($query->have_posts()) : $query->the_post(); ?>
                        <a href="<?php the_permalink() ?>" class="post" aria-label="<?php the_title() ?>">
                            <div class="thumb thumb-11">
                                <div class="date"><span><?php the_time('M') ?></span><span><?php the_time('d') ?></span></div>
                                <div class="img-holder">
                                    <?php the_post_thumbnail('medium_large') ?>
                                </div>
                            </div>
                            <h3 class="title"><?php the_title() ?></h3>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; wp_reset_query(); ?>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
    $about_content = get_field('home_about_content');
?>

<section id="home-about">
    <div class="wrapper">
        <div class="about-inner">
            <?php if($about_content) : ?>
            <div class="content-box">
                <div class="title">
                    <h1><?php echo $about_content['title'] ?></h1>
                </div>
                <div class="content">
                    <?php echo $about_content['content'] ?>
                    <?php if($about_content['button']) : ?>
                    <div class="text-center">
                        <a href="<?php echo $about_content['button']['url'] ?>" target="$about_content['button']['target']" class="custom-btn btn-white"><?php echo $about_content['button']['title'] ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if(have_rows('home_about_shortcuts')) : ?>
            <div class="btn-group">
                <?php 
                    while(have_rows('home_about_shortcuts')) : the_row();
                    $img = get_sub_field('icon');
                    $link = get_sub_field('link');
                ?>
                <a href="<?php echo $link['url'] ?>" class="item" target="<?php echo $link['target'] ?>" aria-label="<?php echo $link['title'] ?>">
                    <div class="img-holder">
                        <?php echo wp_get_attachment_image($img, 'full', false, array('alt'=>$link['title'])) ?>
                    </div>
                    <span><?php echo $link['title'] ?></span>
                </a>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
    $videos = get_field('home_videos');
    if($videos) :
        $video_1 = $videos[0];
        unset($videos[0]);
?>
<section class="section" id="videos">
    <div class="wrapper">
        <?php if(get_field('home_video_title')) : ?>
        <div class="section-title">
            <h2><a href="<?php echo get_field('home_video_url') ? get_field('home_video_url') : '#videos' ?>"><?php the_field('home_video_title') ?></a></h2>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
            </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('home_video_content')) : ?>
        <div class="section-des">
            <?php the_field('home_video_content') ?>
        </div>
        <?php endif; ?>
        <div class="section-content">
            <div class="left-content">
                <h3><?php _e("Giới thiệu trung tâm", "vanhanh") ?></h3>
                <div class="videos">
                    <a href="#" class="video" data-fancybox="video-gallery" data-src="<?php echo $video_1['link'] ?>" aria-label="<?php echo $video_1['title'] ?>">
                        <div class="thumb">
                            <div class="img-holder">
                                <?php echo wp_get_attachment_image($video_1['image'], 'large', false, array()) ?>
                            </div>
                            <span class="play">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-play fa-w-14 fa-3x"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" class=""></path></svg>
                            </span>
                        </div>
                        <span class="title"><?php echo $video_1['title'] ?></span>
                    </a>
                </div>
            </div>
            <div class="right-content">
                <h3><?php _e("Video về Trung Tâm", "vanhanh") ?></h3>
                <div class="videos videos-grid">
                    <?php foreach($videos as $video) : ?>
                    <a href="#" class="video" data-fancybox="video-gallery" data-src="<?php echo $video['link'] ?>" aria-label="<?php echo $video['title'] ?>">
                        <div class="thumb">
                            <div class="img-holder">
                                <?php echo wp_get_attachment_image($video['image'], 'large', false, array()) ?>
                            </div>
                            <span class="play">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-play fa-w-14 fa-3x"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" class=""></path></svg>
                            </span>
                        </div>
                        <span class="title"><?php echo $video['title'] ?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
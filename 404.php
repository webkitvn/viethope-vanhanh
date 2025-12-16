<?php get_header() ?>
<div id="main-content">
    <div class="wrapper">
        <div class="page-content page404">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/404.gif" alt="404 error">
            <h1>404 PAGE NOT FOUND</h1>
            <p>Nội dung này không tồn tại</p>
            <div class="text-center">
                <a href="<?php bloginfo('url') ?>" class="custom-btn" aria-label="Back home"><?php _e("Quay về trang chủ", "vanhanh") ?></a>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
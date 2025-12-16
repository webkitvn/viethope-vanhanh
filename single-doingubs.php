<?php get_header() ?>
<?php get_template_part('templates/content','page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">
                        <?php the_title() ?>
                    </h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh"
                            loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="section-content entry-content doingu-info">
                    <div class="image">
                        <?php the_post_thumbnail() ?>
                    </div>
                    <div class="info">
                        <?php the_content() ?>
                    </div>
                </div>
                <div class="section-content doingu-tabs tabs-wrapper">
                    <ul class="tabs">
                        <?php if(get_field('doingu_gioithieu')) : ?>
                        <li class="active"><a href="#gioi-thieu">Giới thiệu</a></li>
                        <?php endif; ?>
                        <?php if(get_field('doingu_thanhtuu')) : ?>
                        <li><a href="#thanh-tuu">Thành tựu</a></li>
                        <?php endif; ?>
                        <?php if(get_field('doingu_chuyenmon')) : ?>
                        <li><a href="#chuyen-mon">Chuyên môn</a></li>
                        <?php endif; ?>
                        <li><a href="#" class="schedule-btn" data-fancybox="dat-lich-bs"
                                data-src="#dialog-schedule-doctor">Đặt lịch</a></li>
                    </ul>
                    <div class="panels-group">
                        <?php if(get_field('doingu_gioithieu')) : ?>
                        <div class="panel entry-content active" id="gioi-thieu">
                            <?php the_field('doingu_gioithieu') ?>
                        </div>
                        <?php endif; ?>
                        <?php if(get_field('doingu_thanhtuu')) : ?>
                        <div class="panel entry-content" id="thanh-tuu">
                            <?php the_field('doingu_thanhtuu') ?>
                        </div>
                        <?php endif; ?>
                        <?php if(get_field('doingu_chuyenmon')) : ?>
                        <div class="panel entry-content" id="chuyen-mon">
                            <?php the_field('doingu_chuyenmon') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialog-schedule-doctor" style="display:none;max-width:600px;" data-doctor="<?php the_title() ?>">
    <div class="form-title"><?php _e("Đặt lịch khám", "vanhanh") ?></div>
    <div class="form-wrapper">
        <?php echo do_shortcode('[contact-form-7 id="6436" title="Đặt lịch bác sĩ"]') ?>
    </div>
</div>
<?php get_footer() ?>
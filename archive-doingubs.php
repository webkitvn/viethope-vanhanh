<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="wrapper">
            <section class="section">
                <div class="section-title">
                    <h1 class="entry-title"><?php _e("Chuyên gia - Bác Sĩ", "vanhanh") ?></h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh"
                            loading="lazy" width="20" height="20">
                    </div>
                </div>
            </section>
            <section id="doctors_filter" class="filters">
                <div class="chinhanh">
                    <?php echo do_shortcode('[facetwp facet="chi_nhanh"]') ?>
                </div>
                <div class="dropdown-filters">
                    <div class="item">
                        <label for="">Chuyên khoa</label>
                        <?php echo do_shortcode('[facetwp facet="chuyen_khoa"]') ?>
                    </div>
                    <div class="item">
                        <label for="">Chức vụ</label>
                        <?php echo do_shortcode('[facetwp facet="chuc_vu"]') ?>
                    </div>
                    <div class="item">
                        <label for="">Học hàm</label>
                        <?php echo do_shortcode('[facetwp facet="hoc_ham"]') ?>
                    </div>
                    <div class="item">
                        <label for="">Học vị</label>
                        <?php echo do_shortcode('[facetwp facet="hoc_vi"]') ?>
                    </div>
                </div>
                <?php echo do_shortcode('[facetwp facet="filter_reset"]') ?>
            </section>
            <section class="doctors my-4">
                <?php while(have_posts()) : the_post(); ?>
                <?php get_template_part('templates/components/bacsi', 'card') ?>
                <?php endwhile; ?>
            </section>
            <div class="pagi">
                <?php echo do_shortcode('[facetwp facet="doctors_pagination"]') ?>
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
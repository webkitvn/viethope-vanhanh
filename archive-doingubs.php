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
                <div class="doctor" data-mh='bs'>
                    <a class="thumb" href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('medium_large') ?>
                    </a>
                    <div class="text-box">
                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <div class="meta">
                            <p><?php the_field('doingu_pos') ?></p>
                            <?php
                                $chinhanh = get_the_terms($post->ID, 'chinhanh');
                                if($chinhanh):
                            ?>
                            <p><?php echo $chinhanh[0]->name ?></p>
                            <?php endif; ?>
                        </div>
                        <p class="excerpt"><?php echo get_the_excerpt() ?></p>
                    </div>
                    <div class="buttons">
                        <a href="#" class='dat-lich' data-fancybox="dat-lich" data-src="#dialog-schedule-doctor" data-name="<?php the_title() ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4">
                                </path>
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M15 3v4"></path>
                                <path d="M7 3v4"></path>
                                <path d="M3 11h16"></path>
                                <path d="M18 16.496v1.504l1 1"></path>
                            </svg>
                            <span><?php _e("Đặt lịch hẹn", "vanhanh") ?></span>
                        </a>
                        <a href="<?php the_permalink() ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-scan"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 9a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                                <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                                <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M8 16a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2"></path>
                            </svg>
                            <span><?php _e("Xem chi tiết", "vanhanh") ?></span>
                        </a>
                    </div>
                </div>
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
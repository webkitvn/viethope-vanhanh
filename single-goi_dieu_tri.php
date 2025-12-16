<?php 
    global $post;
?>
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="section-content entry-content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php get_template_part('templates/content', 'flexible') ?>
        <div class="section form-section" style="background-color: #f4feff; padding: 2rem 0;">
            <div class="wrapper">
                <div class="form-wrapper form-dang-ky-tam-soat">
                    <div class="form-title">
                        <h2><?php _e("Đặt lịch khám, chữa bệnh", "vanhanh") ?></h2>
                    </div>
                    <div class="form-content">
                        <?php echo do_shortcode('[contact-form-7 id="bc1691e" title="Đăng ký tầm soát"]') ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $query = new WP_Query(array(
                'post_type' => 'goi_dieu_tri',
                'posts_per_page' => 20,
                'no_found_rows' => 1,
                'post__not_in' => array($post->ID),
            ));
            if($query->have_posts()) :
        ?>
        <div class="page-features section pt-4">
            <div class="wrapper">
                <section class="section-title">
                    <h2>Gói điều trị khác</h2>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </section>
                <div class="section-content">
                    <div class="courses courses-slider swiper-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                            <?php while($query->have_posts()) : $query->the_post(); ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink() ?>" class="course">
                                        <div class="thumb thumb-11">
                                            <div class="img-holder">
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                        </div>
                                        <h3 class="title"><?php the_title() ?></h3>
                                        <?php the_excerpt() ?>
                                    </a>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <button class="swiper-button-next swiper-btn"></button>
                            <button class="swiper-button-prev swiper-btn"></button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        const select_chi_nhanh = document.querySelector('[name="chi_nhanh"]');
        
        // Hàm chuẩn hóa văn bản (bỏ dấu, lowercase)
        function normalizeText(text) {
            return text.toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
        }

        // Hàm kiểm tra từ khóa
        function checkKeywords(title, keywords) {
            const normalizedTitle = normalizeText(title);
            return keywords.some(keyword => 
                normalizedTitle.includes(normalizeText(keyword))
            );
        }

        // Hàm tự động chọn option
        function autoSelectChiNhanh() {
            const select = document.querySelector('[name="chi_nhanh"]');
            if (!select) return;
            select.style.pointerEvents = 'none';
            select.style.opacity = '0.5';
            const pageTitle = "<?php echo get_the_terms($post->ID, 'dm_goi_dieu_tri')[0]->name ?>";
            
            // Mapping từ khóa với giá trị cần chọn
            const mappings = [{
                keywords: ['hcm', 'ho chi minh', 'hồ chí minh'],
                value: 'HCM'
            },
            {
                keywords: ['cần thơ', 'can tho'],
                value: 'Cần Thơ'
            },
            {
                keywords: ['long xuyên', 'long xuyen'],
                value: 'Long Xuyên'
            }];
            
            // Tìm và chọn option phù hợp
            for (const mapping of mappings) {
                if (checkKeywords(pageTitle, mapping.keywords)) {
                    const option = Array.from(select.options).find(opt => 
                        normalizeText(opt.textContent).includes(normalizeText(mapping.value))
                    );
                    if (option) {
                        select.value = option.value;
                        // Đặt thuộc tính selected cho option
                        Array.from(select.options).forEach(opt => opt.removeAttribute('selected'));
                        option.setAttribute('selected', 'selected');
                        select.dispatchEvent(new Event('change'));
                        break;
                    }
                }
            }
        }

        // Thực thi tự động chọn
        autoSelectChiNhanh();
    });
</script>
<?php get_footer() ?>
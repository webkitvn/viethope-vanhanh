<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content section">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">
                        <?php
                        single_cat_title();
                        ?>
                    </h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="section-des">
                    <?php
                    if (is_tax('dm_goi_dieu_tri')) {
                        echo term_description();
                    } else {
                        the_field('goidieutri_content', 'option');
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (is_tax('dm_goi_dieu_tri')) {
            $termID = get_queried_object()->term_id;
            $terms = get_terms(array(
                'taxonomy' => 'dm_goi_dieu_tri',
                'hide_empty' => false,
                'parent' => $termID,
                'orderby' => 'menu_order'
            ));
        } else {
            $terms = get_terms(array(
                'taxonomy' => 'dm_goi_dieu_tri',
                'hide_empty' => false,
                'parent' => 0,
                'orderby' => 'menu_order'
            ));
        }
        ?>
        <div class="section">
            <div class="wrapper">
                <?php if ($terms) : ?>
                    <div class="cures cures-grid dmdieutri">
                        <?php
                        foreach ($terms as $term) :
                        ?>
                            <div class="cure">
                                <a href="<?php echo get_term_link($term->term_id, 'dm_goi_dieu_tri') ?>" class="cure-thumb thumb thumb-11">
                                    <div class="img-holder">
                                        <?php
                                        $img = get_field('dmdt_image', $term);
                                        echo wp_get_attachment_image($img, 'large', false, array());
                                        ?>
                                    </div>
                                </a>
                                <h3 class="cure-title"><a href="<?php echo get_term_link($term->term_id, 'dm_goi_dieu_tri') ?>"><?php echo $term->name ?></a></h3>
                                <p><?php echo substr(strip_tags(term_description($term)), 0, 150) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="cures cures-grid">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('templates/content', 'goidieutri');
                        endwhile;
                        ?>
                    </div>
                <?php endif; ?>
                <?php wp_pagenavi() ?>
            </div>
        </div>
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
            const pageTitle = "<?php echo get_queried_object()->name ?>";
            
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
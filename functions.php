<?php

if ( ! function_exists( 'mytheme_setup' ) ) :
    function mytheme_setup() {
        load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'mytheme' ),
            'mobile-menu' => esc_html__( 'Mobile Menu', 'mytheme' ),
            'footer' => esc_html__( 'Footer Menu', 'mytheme' ),
            'checking-menu' => esc_html__( 'Checking Menu', 'mytheme' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mytheme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mytheme_scripts() {
    $ver = '1.0';
    wp_enqueue_style('swipercss', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', array(), $ver, 'all');
    wp_enqueue_style('fancybox', get_template_directory_uri().'/css/fancybox.css', array(), $ver, 'all');
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all' );

    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('headroom', get_template_directory_uri().'/js/headroom.min.js', array(), $ver, true);
    wp_enqueue_script('swiperjs', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', array(), $ver, true);
    wp_enqueue_script('fancyboxjs', get_template_directory_uri().'/js/jquery.fancybox.min.js', array(), $ver, true);
    wp_enqueue_script('matchHeight', get_template_directory_uri().'/js/matchHeight.min.js', array(), $ver, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), $ver, true);
    wp_enqueue_script('slider', get_template_directory_uri().'/js/slider.js', array(), $ver, true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails', array('post', 'us_service'));
    //set_post_thumbnail_size(600, 400, true ); // default Post Thumbnail dimensions (cropped)
}
if ( function_exists( 'add_image_size' ) ) {
    //add_image_size('vertical-size', 400, 600, true );
}
function my_admin_theme_style() {
    wp_enqueue_style('my-admin-style', get_template_directory_uri() . '/css/customadmin.css');
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');

if( function_exists('acf_add_options_page') ) {
    require get_template_directory() . '/inc/options.php';
}
require get_template_directory() . '/inc/filters.php';
require get_template_directory() . '/inc/cf7-tracking.php';


function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_spam', '__return_false');

add_filter('wpcf7_validate_tel', 'cwp_custom_validate_sdt', 10, 2);
add_filter('wpcf7_validate_tel*', 'cwp_custom_validate_sdt', 10, 2);
function cwp_custom_validate_sdt($result, $tag) {
    $name = $tag->name;
    if ($name === 'dien_thoai' || $name === 'dien_thoai*' || $name === 'your-phone' || $name === 'your-phone*') {
        $sdt = isset($_POST[$name]) ? wp_unslash($_POST[$name]) : '';
        if (!preg_match('/^(0\d{9}|\+840\d{9}|\+84[1-9]\d{8})$/', $sdt)) {
            $result->invalidate($tag, 'Số điện thoại không hợp lệ.');
        }
    }
    return $result;
}

/*
 * Check spam cf7 bằng scroll
 * */
add_filter('wpcf7_form_elements', 'cwp_check_scroll_form_cf7');
function cwp_check_scroll_form_cf7($html){
    $html = '<div style="display: none"><p><span class="wpcf7-form-control-wrap" data-name="cwp-scroll"><input size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" value="0" type="text" name="cwp-scroll"></span></p></div>' . $html;
    return $html;
}
add_action('wpcf7_posted_data', 'cwp_check_scroll_form_cf7_vaild');
function cwp_check_scroll_form_cf7_vaild($posted_data) {
    $submission = WPCF7_Submission::get_instance();
    $scroll = isset($posted_data['cwp-scroll']) ? intval($posted_data['cwp-scroll']) : 0;
    //nếu form ở ngay trên đầu page thì thay 5000 thành số nhỏ hơn. ví dụ 200
    if (!$scroll || $scroll <= 200) {
        $submission->set_status( 'spam' );
        $submission->set_response( 'You are spamer' );
    }
    unset($posted_data['cwp-scroll']);
    return $posted_data;
}
 
add_action('wp_footer', function (){
    ?>
    <script>
        const scrollInputs = document.querySelectorAll('input[name="cwp-scroll"]');
        if(scrollInputs.length > 0) {
            let accumulatedScroll = 0;
            function cwpCheckScroll() {
                accumulatedScroll += window.scrollY;
                scrollInputs.forEach(input => {
                    input.value = accumulatedScroll;
                });
 
                //nếu form ở ngay trên đầu page thì thay 6000 thành số nhỏ hơn. ví dụ 300
                if (accumulatedScroll >= 200) {
                    window.removeEventListener('scroll', cwpCheckScroll);
                }
            }
            window.addEventListener('scroll', cwpCheckScroll);
        }
    </script>
    <?php
});

/**
 * Customizes the Contact Form 7 select field for 'goi_tam_soat' dynamically from taxonomy.
 * Refactored for clarity, DRY, and error handling.
 */
function cwp_cf7_taxonomy_select($tag, $unused) {
    // Chỉ xử lý field có tên 'goi_tam_soat'
    global $post;
    if (empty($tag['name']) || $tag['name'] !== 'goi_tam_soat') {
        return $tag;
    }

    $posts = array();

    // Lấy object taxonomy hiện tại nếu có
    $current_taxonomy = get_queried_object();

    // Nếu là trang taxonomy 'dm_goi_dieu_tri' và object hợp lệ
    if (is_tax('dm_goi_dieu_tri') && $current_taxonomy && isset($current_taxonomy->term_id)) {
        $args = array(
            'post_type'      => 'goi_dieu_tri',
            'posts_per_page' => -1,
            'no_found_rows'  => true,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'dm_goi_dieu_tri',
                    'field'    => 'term_id',
                    'terms'    => $current_taxonomy->term_id,
                ),
            ),
        );
        $posts = get_posts($args);
    }
    // Nếu là trang singular của 'goi_dieu_tri'
    elseif (is_singular('goi_dieu_tri')) {
        $post_id = $post->ID;
        $terms = get_the_terms($post_id, 'dm_goi_dieu_tri');
        if (!empty($terms) && is_array($terms)) {
            $term_ids = wp_list_pluck($terms, 'term_id');
            $args = array(
                'post_type'      => 'goi_dieu_tri',
                'posts_per_page' => -1,
                'no_found_rows'  => true,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'dm_goi_dieu_tri',
                        'field'    => 'term_id',
                        'terms'    => $term_ids,
                    ),
                ),
            );
            $posts = get_posts($args);
        }
    }
    // Nếu không phải taxonomy page hoặc không lấy được term, lấy tất cả posts
    if (empty($posts)) {
        $args = array(
            'post_type'      => 'goi_dieu_tri',
            'posts_per_page' => -1,
            'no_found_rows'  => true,
        );
        $posts = get_posts($args);
    }

    // Gán giá trị cho select field
    if (!empty($posts)) {
        foreach ($posts as $post) {
            $title = get_the_title($post->ID);
            $tag['raw_values'][] = $title;
            $tag['values'][]     = $title;
            $tag['labels'][]     = $title;
        }
    } else {
        // Nếu không có posts nào, thêm option mặc định
        $default = 'Không có gói tầm soát';
        $tag['raw_values'][] = $default;
        $tag['values'][]     = $default;
        $tag['labels'][]     = $default;
    }

    // Auto-select current post if we're on a single 'goi_dieu_tri' page
    if (is_singular('goi_dieu_tri') && !empty($tag['values'])) {
        $current_post_title = get_the_title();
        if (in_array($current_post_title, $tag['values'])) {
            $tag['defaults'][] = $current_post_title;
        }
    }

    return $tag;
}

// Hook vào Contact Form 7
add_filter('wpcf7_form_tag', 'cwp_cf7_taxonomy_select', 10, 2);

/**
 * Output current post title as JavaScript variable for auto-selection
 */
function cwp_output_current_post_title() {
    // Chỉ output trên single 'goi_dieu_tri' pages
    if (is_singular('goi_dieu_tri')) {
        $current_post_title = get_the_title();
        if (!empty($current_post_title)) {
            echo '<script>var cwpCurrentPostTitle = "' . esc_js($current_post_title) . '";</script>';
        }
    }
}
add_action('wp_footer', 'cwp_output_current_post_title');

/**
 * Custom validation cho field goi_tam_soat
 */
function cwp_validate_goi_tam_soat($result, $tag) {
    if ($tag->name === 'goi_tam_soat') {
        $value = isset($_POST['goi_tam_soat']) ? sanitize_text_field($_POST['goi_tam_soat']) : '';
        
        // Bỏ qua validation nếu value rỗng (để CF7 tự xử lý required validation)
        if (empty($value)) {
            return $result;
        }
        
        // Lấy taxonomy hiện tại
        $current_taxonomy = get_queried_object();
        
        // Kiểm tra xem có phải taxonomy page không
        if (is_tax('dm_goi_dieu_tri') && $current_taxonomy && isset($current_taxonomy->term_id)) {
            // Lấy danh sách post IDs
            $post_ids = get_posts(array(
                'post_type' => 'goi_dieu_tri',
                'posts_per_page' => -1,
                'no_found_rows' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'dm_goi_dieu_tri',
                        'field' => 'term_id',
                        'terms' => $current_taxonomy->term_id
                    )
                ),
                'fields' => 'ids'
            ));
            $valid_posts = array();
            if (!empty($post_ids)) {
                foreach ($post_ids as $pid) {
                    $valid_posts[] = get_the_title($pid);
                }
            }
            if (!empty($valid_posts) && !in_array($value, $valid_posts)) {
                $result->invalidate($tag, 'Vui lòng chọn gói tầm soát hợp lệ.');
            }
        } else {
            // Nếu không phải taxonomy page, lấy tất cả posts
            $post_ids = get_posts(array(
                'post_type' => 'goi_dieu_tri',
                'posts_per_page' => -1,
                'no_found_rows' => true,
                'fields' => 'ids'
            ));
            $valid_posts = array();
            if (!empty($post_ids)) {
                foreach ($post_ids as $pid) {
                    $valid_posts[] = get_the_title($pid);
                }
            }
            if (!empty($valid_posts) && !in_array($value, $valid_posts)) {
                $result->invalidate($tag, 'Vui lòng chọn gói tầm soát hợp lệ.');
            }
        }
        
        // Nếu không có posts nào, cho phép giá trị "Không có gói tầm soát"
        if (empty($valid_posts) && $value === 'Không có gói tầm soát') {
            return $result;
        }
        
        // Nếu không có posts nào và không phải giá trị mặc định, báo lỗi
        if (empty($valid_posts) && $value !== 'Không có gói tầm soát') {
            $result->invalidate($tag, 'Hiện tại không có gói tầm soát nào khả dụng.');
        }
    }
    
    return $result;
}

add_filter('wpcf7_validate_select', 'cwp_validate_goi_tam_soat', 10, 2);
add_filter('wpcf7_validate_select*', 'cwp_validate_goi_tam_soat', 10, 2);
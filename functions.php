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
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/taxonomies.php';
require get_template_directory() . '/inc/filters.php';
require get_template_directory() . '/inc/cf7-tracking.php';
require get_template_directory() . '/inc/cf7-antispam.php';
require get_template_directory() . '/inc/cf7-goi-tam-soat.php';


function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

add_action( 'admin_head', function () {
    $screen = get_current_screen();
    if ( $screen && 'term' === $screen->base ) {
        echo '<style>#edittag{max-width:1200px}</style>';
    }
} );

if ( ! function_exists( 'vh_get_dm_chuyen_khoa_terms' ) ) {
    /**
     * Get dm_chuyen_khoa terms for archive and taxonomy pages.
     *
     * @param int   $parent_term_id Parent term ID to filter by.
     * @param array $args           Optional additional arguments for get_terms.
     *
     * @return array
     */
    function vh_get_dm_chuyen_khoa_terms( $parent_term_id = 0, $args = array() ) {
        $defaults   = array(
            'taxonomy'   => 'dm_chuyen_khoa',
            'hide_empty' => false,
            'parent'     => $parent_term_id,
            'orderby'    => 'menu_order',
        );
        $query_args = wp_parse_args( $args, $defaults );
        $terms      = get_terms( $query_args );

        if ( is_wp_error( $terms ) ) {
            return array();
        }

        return $terms;
    }
}

if ( ! function_exists( 'vh_get_term_excerpt' ) ) {
    /**
     * Build a short excerpt from a term description.
     *
     * @param WP_Term $term   Term object.
     * @param int     $length Maximum length in characters.
     *
     * @return string
     */
    function vh_get_term_excerpt( $term, $length = 150 ) {
        if ( ! ( $term instanceof WP_Term ) ) {
            return '';
        }

        $description = term_description( $term );

        if ( '' === $description ) {
            return '';
        }

        $text = wp_strip_all_tags( $description );

        if ( function_exists( 'mb_substr' ) ) {
            $excerpt = mb_substr( $text, 0, $length );
        } else {
            $excerpt = substr( $text, 0, $length );
        }

        if ( strlen( $text ) > $length ) {
            $excerpt .= '...';
        }

        return $excerpt;
    }
}
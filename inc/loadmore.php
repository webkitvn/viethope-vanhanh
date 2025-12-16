<?php 
    function nguyentam_load_more_scripts() {
     
        // register our main script but do not enqueue it yet
        if(is_tax('usdirect_portfolio_cat')){
            wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/js/loadmore-portfolios-ajax.js', array('jquery') );
        }

        if(is_post_type_archive(['commisstions', 'projects'])){
            wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/js/loadmore-posts-ajax.js', array('jquery') );
        }
     
        wp_localize_script( 'loadmore', 'ajax_posts', array(
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
            'noposts' => __('No older posts found', 'usdirect'),
        ) );
     
        wp_enqueue_script( 'loadmore' );
    }
     
    add_action( 'wp_enqueue_scripts', 'nguyentam_load_more_scripts' );


    //Load more portfolios
    function more_portfolios_ajax(){

        $cat = $_POST["cat"];
        $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
        $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    
        header("Content-Type: text/html");

        $args = array(
            'post_type' => 'nguyentam_portfolio',
            'posts_per_page' => $ppp,
            'paged'    => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'nguyentam_portfolio_cat',
                    'field' => 'term_id',
                    'terms' => $cat
                )
            )
        );
    
        $loop = new WP_Query($args);
    
        $out = '';
    
        if ($loop -> have_posts()) :  
            while ($loop -> have_posts()) : $loop -> the_post();
                $out .= get_template_part('templates/content', 'portfolio');
            endwhile;
        endif;
        wp_reset_postdata();
        die($out);
    }
    
    add_action('wp_ajax_nopriv_more_portfolios_ajax', 'more_portfolios_ajax');
    add_action('wp_ajax_more_portfolios_ajax', 'more_portfolios_ajax');


    //Load more posts
    function more_posts_ajax(){
        $post_type = $_POST["post_type"];
        $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
        $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    
        header("Content-Type: text/html");

        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $ppp,
            'paged'    => $page,
        );
    
        $loop = new WP_Query($args);
    
        $out = '';
    
        if ($loop -> have_posts()) :  
            while ($loop -> have_posts()) : $loop -> the_post();
                $out .= get_template_part('templates/content', 'post-grid');
            endwhile;
        endif;
        wp_reset_postdata();
        die($out);
    }
    
    add_action('wp_ajax_nopriv_more_posts_ajax', 'more_posts_ajax');
    add_action('wp_ajax_more_posts_ajax', 'more_posts_ajax');
?>

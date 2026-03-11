<?php
    function vanhanh_register_my_cpts() {

        /**
         * Post Type: Chuyên khoa.
         */
        
            $labels = [
                "name" => esc_html__( "Chuyên khoa", "vanhanh" ),
                "singular_name" => esc_html__( "Chuyên khoa", "vanhanh" ),
            ];
        
            $args = [
                "label" => esc_html__( "Chuyên khoa", "vanhanh" ),
                "labels" => $labels,
                "description" => "",
                "public" => true,
                "publicly_queryable" => true,
                "show_ui" => true,
                "show_in_rest" => true,
                "rest_base" => "",
                "rest_controller_class" => "WP_REST_Posts_Controller",
                "rest_namespace" => "wp/v2",
                "has_archive" => "chuyen-khoa",
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "delete_with_user" => false,
                "exclude_from_search" => false,
                "capability_type" => "post",
                "map_meta_cap" => true,
                "hierarchical" => false,
                "can_export" => true,
                "rewrite" => [ "slug" => "chuyen-khoa", "with_front" => true ],
                "query_var" => true,
                "menu_position" => 5,
                "menu_icon" => "dashicons-clipboard",
                "supports" => [ "title", "editor", "thumbnail" ],
                "show_in_graphql" => false,
            ];
        
            register_post_type( "chuyen_khoa", $args );
    
        /**
         * Post Type: Đội Ngũ Bác Sĩ.
         */
    
        $labels = [
            "name" => esc_html__( "Đội Ngũ Bác Sĩ", "vanhanh" ),
            "singular_name" => esc_html__( "Đội Ngũ Bác Sĩ", "vanhanh" ),
            "all_items" => esc_html__( "Tất cả", "vanhanh" ),
        ];
    
        $args = [
            "label" => esc_html__( "Đội Ngũ Bác Sĩ", "vanhanh" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => "doi-ngu-bac-si",
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => [ "slug" => "doingubs", "with_front" => true ],
            "query_var" => true,
            "menu_position" => 10,
            "menu_icon" => "dashicons-image-filter",
            "supports" => [ "title", "editor", "thumbnail" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "doingubs", $args );
    
        /**
         * Post Type: Khóa học.
         */
    
        $labels = [
            "name" => esc_html__( "Khóa học", "vanhanh" ),
            "singular_name" => esc_html__( "Khóa học", "vanhanh" ),
        ];
    
        $args = [
            "label" => esc_html__( "Khóa học", "vanhanh" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => true,
            "rewrite" => [ "slug" => "khoa-hoc", "with_front" => true ],
            "query_var" => true,
            "menu_position" => 11,
            "menu_icon" => "dashicons-book-alt",
            "supports" => [ "title", "editor", "thumbnail" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "khoa_hoc", $args );
    
        /**
         * Post Type: Gói điều trị.
         */
    
        $labels = [
            "name" => esc_html__( "Gói điều trị", "vanhanh" ),
            "singular_name" => esc_html__( "Gói điều trị", "vanhanh" ),
        ];
    
        $args = [
            "label" => esc_html__( "Gói điều trị", "vanhanh" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => "goi-dieu-tri",
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => true,
            "rewrite" => [ "slug" => "goi-dieu-tri", "with_front" => true ],
            "query_var" => true,
            "menu_position" => 5,
            "menu_icon" => "dashicons-universal-access-alt",
            "supports" => [ "title", "editor", "thumbnail" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "goi_dieu_tri", $args );
    
        /**
         * Post Type: Liệu pháp y học.
         */
    
        $labels = [
            "name" => esc_html__( "Liệu pháp y học", "vanhanh" ),
            "singular_name" => esc_html__( "Liệu pháp y học", "vanhanh" ),
        ];
    
        $args = [
            "label" => esc_html__( "Liệu pháp y học", "vanhanh" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => "lieu-phap-y-hoc",
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => true,
            "rewrite" => [ "slug" => "lieu-phap-y-hoc", "with_front" => true ],
            "query_var" => true,
            "menu_position" => 6,
            "menu_icon" => "dashicons-filter",
            "supports" => [ "title", "editor", "thumbnail" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "lieu_phap_y_hoc", $args );
    }
    
    add_action( 'init', 'vanhanh_register_my_cpts' );
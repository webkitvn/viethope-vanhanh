<?php
    function vanhanh_register_my_taxes() {

        /**
         * Taxonomy: Danh mục chuyên khoa.
         */
        
            $labels = [
                "name" => esc_html__( "Danh mục chuyên khoa", "vanhanh" ),
                "singular_name" => esc_html__( "Danh mục chuyên khoa", "vanhanh" ),
            ];
        
            
            $args = [
                "label" => esc_html__( "Danh mục chuyên khoa", "vanhanh" ),
                "labels" => $labels,
                "public" => true,
                "publicly_queryable" => true,
                "hierarchical" => true,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "query_var" => true,
                "rewrite" => [ 'slug' => 'dm-chuyen-khoa', 'with_front' => true,  'hierarchical' => true, ],
                "show_admin_column" => true,
                "show_in_rest" => true,
                "show_tagcloud" => false,
                "rest_base" => "dm_chuyen_khoa",
                "rest_controller_class" => "WP_REST_Terms_Controller",
                "rest_namespace" => "wp/v2",
                "show_in_quick_edit" => true,
                "sort" => false,
                "show_in_graphql" => false,
            ];
            register_taxonomy( "dm_chuyen_khoa", [ "chuyen_khoa" ], $args );
    
        /**
         * Taxonomy: Phòng ban.
         */
    
        $labels = [
            "name" => esc_html__( "Phòng ban", "vanhanh" ),
            "singular_name" => esc_html__( "Phòng ban", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Phòng ban", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'doingubs_cat', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "doingubs_cat",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "doingubs_cat", [ "doingubs" ], $args );
    
        /**
         * Taxonomy: Gói điều trị.
         */
    
        $labels = [
            "name" => esc_html__( "Gói điều trị", "vanhanh" ),
            "singular_name" => esc_html__( "Gói điều trị", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Gói điều trị", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'dm_goi_dieu_tri', 'with_front' => true,  'hierarchical' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "dm_goi_dieu_tri",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "dm_goi_dieu_tri", [ "goi_dieu_tri" ], $args );
    
        /**
         * Taxonomy: Danh mục liệu pháp.
         */
    
        $labels = [
            "name" => esc_html__( "Danh mục liệu pháp", "vanhanh" ),
            "singular_name" => esc_html__( "Danh mục liệu pháp", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Danh mục liệu pháp", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'dm_lieuphapyhoc', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "dm_lieuphapyhoc",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "dm_lieuphapyhoc", [ "lieu_phap_y_hoc" ], $args );
    
        /**
         * Taxonomy: Danh mục khóa học.
         */
    
        $labels = [
            "name" => esc_html__( "Danh mục khóa học", "vanhanh" ),
            "singular_name" => esc_html__( "Danh mục khóa học", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Danh mục khóa học", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'dm_khoa_hoc', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "dm_khoa_hoc",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "dm_khoa_hoc", [ "khoa_hoc" ], $args );
    
        /**
         * Taxonomy: Chuyên khoa.
         */
    
        $labels = [
            "name" => esc_html__( "Chuyên khoa", "vanhanh" ),
            "singular_name" => esc_html__( "Chuyên khoa", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Chuyên khoa", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'chuyenkhoa', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => true,
            "rest_base" => "chuyenkhoa",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => true,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "chuyenkhoa", [ "doingubs" ], $args );
    
        /**
         * Taxonomy: Chức vụ.
         */
    
        $labels = [
            "name" => esc_html__( "Chức vụ", "vanhanh" ),
            "singular_name" => esc_html__( "Chức vụ", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Chức vụ", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'chucvu', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => true,
            "rest_base" => "chucvu",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => true,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "chucvu", [ "doingubs" ], $args );
    
        /**
         * Taxonomy: Học Hàm.
         */
    
        $labels = [
            "name" => esc_html__( "Học Hàm", "vanhanh" ),
            "singular_name" => esc_html__( "Học Hàm", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Học Hàm", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'hocham', 'with_front' => true,  'hierarchical' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => true,
            "rest_base" => "hocham",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => true,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "hocham", [ "doingubs" ], $args );
    
        /**
         * Taxonomy: Học Vị.
         */
    
        $labels = [
            "name" => esc_html__( "Học Vị", "vanhanh" ),
            "singular_name" => esc_html__( "Học Vị", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Học Vị", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'hocvi', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => true,
            "rest_base" => "hocvi",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => true,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "hocvi", [ "doingubs" ], $args );
    
        /**
         * Taxonomy: Chi nhánh.
         */
    
        $labels = [
            "name" => esc_html__( "Chi nhánh", "vanhanh" ),
            "singular_name" => esc_html__( "Chi nhánh", "vanhanh" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Chi nhánh", "vanhanh" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'chinhanh', 'with_front' => true, ],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => true,
            "rest_base" => "chinhanh",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => true,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "chinhanh", [ "doingubs" ], $args );
    }
    add_action( 'init', 'vanhanh_register_my_taxes' );
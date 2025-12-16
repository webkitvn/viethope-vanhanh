<?php 
    acf_add_options_page(array(
        'page_title' 	=> 'Theme Options',
        'menu_title'	=> 'Theme Options',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Scripts',
        'menu_title'	=> 'Scripts',
        'parent_slug'	=> 'theme-general-settings',
    ));
?>
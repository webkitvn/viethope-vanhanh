<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

	
<body <?php body_class(); ?>>
    <?php wp_body_open() ?>
    <header id="main-header" data-headroom>
        <div class="wrapper">
            <div class="header-inner">
                <?php 
                    $logo = get_field('site_logo', 'option');
                    if($logo) : 
                ?>
                <a href="<?php echo bloginfo('url') ?>" class="logo" aria-label="<?php bloginfo('name') ?>">
                    <?php 
                        $args = array(
                            'alt'=>get_bloginfo('name'),
                        );
                        echo wp_get_attachment_image($logo, 'medium_large', false, $args);
                    ?>
                </a>
                <?php endif; ?>

                <div class="header-nav">
                    <div class="top-nav">
                        <?php if(get_field('header_custom_text', 'option')) : ?>
                        <div class="custom-text">
                            <?php the_field('header_custom_text', 'option') ?>
                        </div>
                        <?php endif; ?>

                        <div class="header-btns">
                            <?php 
                                $headerBtn1 = get_field('header_btn_1', 'option');
                                if($headerBtn1) :
                            ?>
                            <a class="h-btn"
                                href="<?php echo $headerBtn1['url'] ?>"><?php echo $headerBtn1['text'] ?></a>
                            <?php endif; ?>

                            <?php 
                                $headerBtn2 = get_field('header_btn_2', 'option');
                                if($headerBtn2) :
                            ?>
                            <a class="h-btn"
                                href="<?php echo $headerBtn2['url'] ?>"><?php echo $headerBtn2['text'] ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="bottom-nav">
                        <?php 
                            wp_nav_menu( array(
                                'menu' => 'primary',
                                'theme_location' => 'primary'
                            ) )
                        ?>
                        <div class="search-wrapper">
                            <button class="search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="search-form">
                                <form action="/">
                                    <div class="form-wrapper">
                                        <input type="search" name="s" placeholder="Nhập từ khóa">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="menu-toggle" class="menu-toggle-btn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>
    <div id="mobile-menu">
        <div class="search-form">
            <form action="/">
                <div class="form-wrapper">
                    <input type="search" name="s" placeholder="Nhập từ khóa">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <?php 
            wp_nav_menu( array(
                'menu' => 'mobile-menu',
                'theme_location' => 'mobile-menu'
            ) )
        ?>
    </div>
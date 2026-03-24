    <footer id="footer">
        <div class="wrapper">
            <div class="footer-inner">
                <div class="footer-left">
                    <?php
                    if (get_field('footer_logo', 'option')) :
                        $logo = get_field('footer_logo', 'option');
                    ?>
                        <a href="<?php bloginfo('url') ?>" class="logo" aria-label="<?php bloginfo('name') ?>">
                            <?php
                            $args = array(
                                'alt' => get_bloginfo('name'),
                                'width' => 250,
                                'height' => 70
                            );
                            echo wp_get_attachment_image($logo, 'full', false, $args);
                            ?>
                        </a>
                    <?php endif; ?>
                    <div class="footer-items">
                        <div class="column">
                            <div class="item">
                                <div class="title">
                                    <h3><?php _e("Thông tin trung tâm y khoa", "vanhanh") ?></h3>
                                </div>
                                <div class="content">
                                    <?php the_field('footer_1', 'option') ?>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="item mb-5">
                                <div class="title">
                                    <h3><?php _e("Thông tin khách hàng", "vanhanh") ?></h3>
                                </div>
                                <div class="content">
                                    <?php
                                    wp_nav_menu(array(
                                        'menu' => 'footer',
                                        'theme_location' => 'footer'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="item mb-5">
                                <div class="title">
                                    <h3><?php _e("Giờ làm việc", "vanhanh") ?></h3>
                                </div>
                                <div class="content">
                                    <?php the_field('footer_2', 'option') ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title">
                                    <h3><?php _e("Kết nối với chúng tôi", "vanhanh") ?></h3>
                                </div>
                                <div class="content socials">
                                    <?php if (get_field('facebook_url', 'option')) : ?>
                                        <a href="<?php the_field('facebook_url', 'option') ?>" target="_blank">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="svg-inline--fa fa-facebook fa-w-16 fa-3x">
                                                <path fill="currentColor"
                                                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                                                    class=""></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('instagram_url', 'option')) : ?>
                                        <a href="<?php the_field('instagram_url', 'option') ?>" target="_blank">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fab"
                                                data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14 fa-3x">
                                                <path fill="currentColor"
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                                    class=""></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('youtube_url', 'option')) : ?>
                                        <a href="<?php the_field('youtube_url', 'option') ?>" target="_blank">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                class="svg-inline--fa fa-youtube fa-w-18 fa-3x">
                                                <path fill="currentColor"
                                                    d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
                                                    class=""></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('tiktok_url', 'option')) : ?>
                                        <a href="<?php the_field('tiktok_url', 'option') ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="95" height="109" fill="none" viewBox="0 0 95 109">
                                                <path fill="#fff" d="M94.641 26.454v18.654a49.38 49.38 0 0 1-12.178-2.776A49.033 49.033 0 0 1 68.81 34.65v37.703l-.076-.118c.048.748.076 1.51.076 2.278 0 18.723-15.23 33.965-33.955 33.965C16.13 108.477.9 93.235.9 74.511.9 55.788 16.13 40.54 34.855 40.54c1.834 0 3.633.145 5.39.429v18.384a16.007 16.007 0 0 0-5.39-.928c-8.864 0-16.082 7.213-16.082 16.087 0 8.873 7.218 16.086 16.082 16.086s16.081-7.22 16.081-16.087c0-.332-.007-.664-.027-.996V.248h18.634c.07 1.578.132 3.17.201 4.748a14.71 14.71 0 0 0 3.162 8.535 35.353 35.353 0 0 0 10.297 8.873 35.487 35.487 0 0 0 11.438 4.064v-.014Z" />
                                            </svg>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        &copy;<?php echo date('Y') ?> Trung Tâm Y Khoa Vạn Hạnh. All rights reserved | Make by <a href="https://cuongwp.com" target="_blank" rel="nofollow" style="color: #fff;text-decoration: none;">CuongWP</a> from <a href="https://amwind.vn" target="_blank" rel="nofollow" style="color: #fff;text-decoration: none;">Amwind</a>
                    </div>
                </div>
                <div class="footer-right">
                    <h2 class="title"><?php _e("Liên hệ tư vấn", "vanhanh") ?></h2>
                    <p><?php _e("Vui lòng cung cấp thông tin, bộ phận CSKH sẽ liên hệ lại trong thời gian sớm nhất", "vanhanh") ?>
                    </p>
                    <div class="form">
                        <?php echo do_shortcode('[contact-form-7 id="64" title="Liên hệ"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php get_template_part('templates/content', 'chat-bubbles') ?>

    <div id="dialog-schedule" style="display:none;max-width:600px;">
        <div class="form-title"><?php _e("Đặt lịch khám", "vanhanh") ?></div>
        <div class="form-wrapper">
            <div class="step forms">
                <div class="panel active" id="ho-chi-minh">
                    <?php echo do_shortcode('[contact-form-7 id="382" title="Đặt lịch khám - HCM"]') ?>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer() ?>

    </body>

    </html>
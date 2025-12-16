<?php if (get_field('active_chat_bubble', 'option')) : ?>
<div id="chat-bubble">
    <div class="chat-items">
        <a href="#" class="chat-icon chat-btn-toggle">
            <span><?php _e("Liên hệ", "vanhanh") ?></span>
            <img class="close" src="<?php echo get_template_directory_uri() ?>/img/cancel.svg" alt="Close" width="20" height="20" loading="lazy">
        </a>
        <div class="item-group">
            <?php 
            $chat_items = [
                'facebook_id' => ['url' => 'https://m.me/', 'icon' => 'chat-fb.svg', 'alt' => 'Chat Facebook', 'text' => 'facebook_text'],
                'zalo_oa' => ['url' => '', 'icon' => 'zalo-oa.svg', 'alt' => 'Chat Zalo', 'text' => 'zalo_oa_text'],
                'zalo_oa_2' => ['url' => '', 'icon' => 'zalo-oa.svg', 'alt' => 'Chat Zalo', 'text' => 'zalo_oa_2_text'],
                'zalo_phone' => ['url' => '', 'icon' => 'chat-zalo.svg', 'alt' => 'Chat Zalo', 'text' => 'zalo_text'],
                'hotline_num' => ['url' => 'tel:', 'icon' => 'call-hotline.svg', 'alt' => 'Hotline', 'text' => 'hotline_text']
            ];

            foreach ($chat_items as $field => $item) {
                if (get_field($field, 'option')) : ?>
                    <a href="<?php echo $item['url'] . get_field($field, 'option') ?>" class="chat-item chat-item-<?php echo $field ?>" title="<?php echo $item['alt'] ?>" target="_blank">
                        <img class="chat-item-icon chat-icon-<?php echo $field ?>" src="<?php echo get_template_directory_uri() ?>/img/<?php echo $item['icon'] ?>" alt="<?php echo $item['alt'] ?>" loading="lazy" width="45" height="45">
                        <?php if (get_field($item['text'], 'option')) : ?>
                            <span class="chat-item-text"><?php echo get_field($item['text'], 'option') ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif;
            }
            ?>
        </div>
    </div>
    <?php if (get_field('active_schedule', 'option')) : ?>
        <a href="#" class="contact-btn contact-icon" title="<?php _e("Đặt lịch", "vanhanh") ?>" data-fancybox="dat-lich-kham" data-src="#dialog-schedule">
            <span><?php _e("Đặt lịch", "vanhanh") ?></span>
        </a>
    <?php endif; ?>
    <div class="contact-btn checking-btn">
        <span>
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="notes-medical" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-notes-medical fa-w-12 fa-3x"><path fill="currentColor" d="M336 64h-88.6c.4-2.6.6-5.3.6-8 0-30.9-25.1-56-56-56s-56 25.1-56 56c0 2.7.2 5.4.6 8H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM192 32c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm160 432c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h48v20c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12V96h48c8.8 0 16 7.2 16 16v352zm-72-176h-56v-56c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v56h-56c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h56v56c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-56h56c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z" class=""></path></svg>
            <span>Kiểm tra<br>sức khỏe</span>
        </span>
        <img class="close" src="<?php echo get_template_directory_uri() ?>/img/cancel.svg" alt="Close" width="20" height="20" loading="lazy">
        <div class="menu-wrapper">
            <?php 
            wp_nav_menu(array(
                'menu' => 'checking-menu',
                'theme_location' => 'checking-menu'
            ));
            ?>
        </div>
    </div>
</div>
<?php endif; ?>
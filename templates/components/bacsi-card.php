<div class="doctor" data-mh='bs'>
    <a class="thumb" href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('medium_large') ?>
    </a>
    <div class="text-box">
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <div class="meta">
            <p><?php the_field('doingu_pos') ?></p>
            <?php
                                $chinhanh = get_the_terms($post->ID, 'chinhanh');
                                if($chinhanh):
                            ?>
            <p><?php echo $chinhanh[0]->name ?></p>
            <?php endif; ?>
        </div>
        <p class="excerpt"><?php echo get_the_excerpt() ?></p>
    </div>
    <div class="buttons">
        <a href="#" class='dat-lich' data-fancybox="dat-lich" data-src="#dialog-schedule-doctor"
            data-name="<?php the_title() ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4">
                </path>
                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M15 3v4"></path>
                <path d="M7 3v4"></path>
                <path d="M3 11h16"></path>
                <path d="M18 16.496v1.504l1 1"></path>
            </svg>
            <span><?php _e("Đặt lịch hẹn", "vanhanh") ?></span>
        </a>
        <a href="<?php the_permalink() ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-scan" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 9a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                <path d="M8 16a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2"></path>
            </svg>
            <span><?php _e("Xem chi tiết", "vanhanh") ?></span>
        </a>
    </div>
</div>
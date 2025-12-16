<?php /* Template name: Trung tâm đào tạo */ ?>
<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
        <div class="entry-content">
            <div class="wrapper">
                <div class="section-title">
                    <h1 class="entry-title">Trung tâm đào tạo</h1>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </div>
                <div class="content">
                    <p>Trung tâm y khoa Vạn Hạnh kính gởi đến Quý Khách hàng lời chào thân ái và xin cảm ơn Quý khách!
                Thế kỷ 21 là thế kỷ của bệnh không lây và trong đó ngành Y học rất quan tâm đến chuyên khoa Đau, Thần kinh và Nội tiết. Cùng với các bệnh mạch máu, các chuyên khoa này sẽ chiếm một tỷ lệ cao trong tỷ lệ bệnh tật của dân số Thế giới. Hiện nay, Việt Nam là một nước đang phát triển với tốc độ tăng trưởng nhanh, do đó, xu hướng bệnh lý không lây cũng gia tăng theo gây ra gánh nặng cho nền Y tế, và tốn thất không thể đo đếm được cho người bệnh.</p>
                    <p>Chúng tôi thấu hiểu được những tổn thất về tinh thần, thể chất và gánh nặng về kinh tế mà bệnh nhân phải gánh chịu. Với sự đồng thuận của các chuyên gia về Đau, Thần kinh và Nội tiết, Trung tâm Y Khoa Vạn Hạnh đã được thành lập.Sở hữu các trang thiết bị hiện đại, Đội ngũ y bác sĩ chất giàu kinh nghiệm cùng phương châm lấy người bệnh làm trung tâm, chúng tôi mong muốn đưa giải pháp kiểm soát Đau, Thần kinh và Nội tiết chuyên sâu với hiệu quả cao nhất đến với người bệnh.</p>
                </div>
            </div>
        </div>
        <div class="page-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img-holder">
                            <img src="https://source.unsplash.com/800x600?doctor" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img-holder">
                            <img src="https://source.unsplash.com/800x600?nurse" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img-holder">
                            <img src="https://source.unsplash.com/800x600?hospital" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img-holder">
                            <img src="https://source.unsplash.com/800x600?care" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $courses = get_field('courses');
            if($courses) :
        ?>
        <div class="page-features section">
            <div class="wrapper">
                <section class="section-title">
                    <h2><?php _e('Các khóa học', 'vanhanh') ?></h2>
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                    </div>
                </section>
                <div class="section-content">
                    <div class="posts courses-slider swiper-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($courses as $post) : setup_postdata( $post ); ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink() ?>" class="post">
                                        <div class="thumb thumb-11">
                                            <div class="img-holder">
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                        </div>
                                        <h3 class="title"><?php the_title() ?></h3>
                                        <?php the_excerpt() ?>
                                    </a>
                                </div>
                                <?php endforeach; wp_reset_postdata() ?>
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <button class="swiper-button-next swiper-btn"></button>
                            <button class="swiper-button-prev swiper-btn"></button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>
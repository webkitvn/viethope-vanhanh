<?php /* Template name: Kết quả */ ?>

<?php 
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $total = 0;
    $result = "Chưa có kết quả";
    if($queries['ques-d-1'] === null && $queries['ques-a-1'] === null && $queries['ques-s-1'] === null){
        foreach($queries as $q){
            $point = intval($q);
            $total += $point;
        }
        if($total > 4){
            $result = __("Bạn cần đến gặp bác sĩ", "vanhanh");
        }
        else{
            $result = __("Bạn cần tự thay đổi thói quen sinh hoạt", "vanhanh");
        }
    }
    else{
        function get_result($score, $ranges) {
            foreach ($ranges as $range => $result) {
                list($min, $max) = explode('-', $range);
                if ($score >= $min && $score <= $max) {
                    return $result;
                }
            }
            return "Bình thường";
        }
        
        $d = $a = $s = 0;
        $result_d = $result_a = $result_s = $result = "Bình thường";
        
        foreach ($queries as $key => $q) {
            $point = intval($q);
            if (strpos($key, 'ques-d') !== false) {
                $d += $point;
            }
            if (strpos($key, 'ques-a') !== false) {
                $a += $point;
            }
            if (strpos($key, 'ques-s') !== false) {
                $s += $point;
            }
        }
        
        $total = $d + $a + $s;
        
        $d_ranges = [
            '0-4' => "Bình thường",
            '5-6' => "Nhẹ",
            '7-10' => "Trung bình",
            '11-13' => "Nặng",
            '14-9999' => "Rất nặng"
        ];
        
        $a_ranges = [
            '0-3' => "Bình thường",
            '4-5' => "Nhẹ",
            '6-7' => "Trung bình",
            '8-9' => "Nặng",
            '10-9999' => "Rất nặng"
        ];
        
        $s_ranges = [
            '0-7' => "Bình thường",
            '8-9' => "Nhẹ",
            '10-12' => "Trung bình",
            '13-16' => "Nặng",
            '17-9999' => "Rất nặng"
        ];
        
        $total_ranges = [
            '0-16' => "Chưa có kết quả",
            '17-20' => "Theo dõi. Lặp lại đánh giá",
            '21-25' => "Tư vấn kế hoạch điều trị. Cân nhắc tham vấn tâm lý",
            '26-29' => "Điều trị thuốc ngay. Cân nhắc kết hợp tham vấn tâm lý",
            '30-9999' => "Điều trị thuốc ngay. Cân nhắc kết hợp tham vấn tâm lý"
        ];
        
        $result_d = get_result($d, $d_ranges);
        $result_a = get_result($a, $a_ranges);
        $result_s = get_result($s, $s_ranges);
        $result = get_result($total, $total_ranges);
    }
?>

<?php get_header() ?>
<?php get_template_part('templates/content', 'page-header') ?>
<div id="main-content">
    <div class="page-content">
        <?php get_template_part('templates/content', 'breadcrumbs') ?>
    </div>
    <div class="entry-content">
        <div class="wrapper">
            <div class="section-title">
                <h1 class="entry-title">
                    <?php echo  __("Cảm ơn vì bạn đã tham gia kiểm tra <br>Kết quả của bạn là", "vanhanh") ?>    
                </h1>
                <div class="icon">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vh-icon.svg" alt="van hanh" loading="lazy" width="20" height="20">
                </div>
            </div>
            <div class="content entry-content">
                <div class="sub-results">
                    <?php
                        if($queries['ques-d-1'] !== null) :
                    ?>
                    <div class="result">
                        <h2>
                            <span>Phân độ</span>
                            <span>D - Trầm cảm</span>
                        </h2>
                        <div class="point">
                            <div class="content">
                                <ins class="amount"><span class="num"><?php echo $d; ?><span class="unit"><?php _e("Điểm", "vanhanh") ?></span></span></ins>
                                <h3><?php echo $result_d; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                        if($queries['ques-a-1'] !== null) :
                    ?>
                    <div class="result">
                        <h2>
                            <span>Phân độ</span>
                            <span>A - Lo âu</span>
                        </h2>
                        <div class="point">
                            <div class="content">
                                <ins class="amount"><span class="num"><?php echo $a; ?><span class="unit"><?php _e("Điểm", "vanhanh") ?></span></span></ins>
                                <h3><?php echo $result_a; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                        if($queries['ques-s-1'] !== null) :
                    ?>
                    <div class="result">
                        <h2>
                            <span>Phân độ</span>
                            <span>S - Căng thẳng</span>
                        </h2>
                        <div class="point">
                            <div class="content">
                                <ins class="amount"><span class="num"><?php echo $s; ?><span class="unit"><?php _e("Điểm", "vanhanh") ?></span></span></ins>
                                <h3><?php echo $result_s; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="result total-result">
                    <h2>
                        Tổng điểm
                    </h2>
                    <div class="point">
                        <div class="content">
                            <ins class="amount"><span class="num"><?php echo $total; ?><span class="unit"><?php _e("Điểm", "vanhanh") ?></span></span></ins>
                            <h3><?php echo $result; ?></h3>
                        </div>
                    </div>
                    <div class="note"><?php _e("Kết quả trên mang tính chất tương đối. <br>Hãy liên hệ với các chuyên viên của chúng tôi để được tư vấn miễn phí, tận tình, chu đáo.", "vanhanh"); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
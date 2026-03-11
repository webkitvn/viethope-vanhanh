<?php 
    $img = false;
    if(is_singular()){
        $img = get_field('header_image');
    }
    elseif(is_category() || is_tax()){
        $term = get_queried_object();
        $img = get_field('header_image', $term);
    }
    elseif(is_post_type_archive('chuyen_khoa')){
        $img = get_field('dmdieutri_banner', 'option');
    }
    elseif(is_post_type_archive('goi_dieu_tri')){
        $img = get_field('goidieutri_banner', 'option');
    }
    elseif(is_post_type_archive('lieu_phap_y_hoc')){
        $img = get_field('lieuphapyhoc_banner', 'option');
    }
    if($img) :
?>
<div class="page-header">
    <div class="img-holder bg">
        <?php echo wp_get_attachment_image($img, 'full', false, array()) ?>
    </div>
</div>
<?php endif; ?>
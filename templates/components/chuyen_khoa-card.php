<?php
$term = get_query_var( 'vh_chuyen_khoa_term' );

if ( ! ( $term instanceof WP_Term ) ) {
    return;
}

$term_link = get_term_link( $term->term_id, 'dm_chuyen_khoa' );

if ( is_wp_error( $term_link ) ) {
    return;
}

$image_id = get_field( 'dmdt_image', $term );
$excerpt  = vh_get_term_excerpt( $term, 150 );
?>
<div class="cure">
    <a href="<?php echo esc_url( $term_link ); ?>" class="cure-thumb thumb thumb-11">
        <div class="img-holder">
            <?php
            if ( $image_id ) {
                echo wp_get_attachment_image( $image_id, 'large', false, array() );
            }
            ?>
        </div>
    </a>
    <div class="info-box">
        <h3 class="cure-title">
            <a href="<?php echo esc_url( $term_link ); ?>">
                <?php echo esc_html( $term->name ); ?>
            </a>
        </h3>
        <?php if ( $excerpt ) : ?>
            <p><?php echo esc_html( $excerpt ); ?></p>
        <?php endif; ?>
    </div>
</div>


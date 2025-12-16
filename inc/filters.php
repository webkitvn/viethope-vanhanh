<?php
add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );

add_action( 'wp_head', function() {
	?>
    <script>
    (function($) {
        $(document).on('facetwp-refresh', function() {
            $('.facetwp-template').addClass('loading').prepend('<div class="is-loading">Loading...</div>');
        });
        $(document).on('facetwp-loaded', function() {
            $('.facetwp-template .is-loading').remove();
            $('.facetwp-template').removeClass('loading');
        });
    })(jQuery);
    </script>
<?php
	}, 100 );
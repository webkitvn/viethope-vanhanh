<?php
/**
 * Contact Form 7 – Anti-spam & validation helpers.
 *
 * - Disable autop
 * - Disable built-in spam flag
 * - Phone number validation
 * - Scroll-based spam check (hidden field + JS)
 */

add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_spam', '__return_false');

/**
 * Phone number validation for CF7 tel fields.
 */
add_filter('wpcf7_validate_tel', 'cwp_custom_validate_sdt', 10, 2);
add_filter('wpcf7_validate_tel*', 'cwp_custom_validate_sdt', 10, 2);
function cwp_custom_validate_sdt($result, $tag) {
	$name = $tag->name;
	if ($name === 'dien_thoai' || $name === 'dien_thoai*' || $name === 'your-phone' || $name === 'your-phone*') {
		$sdt = isset($_POST[$name]) ? wp_unslash($_POST[$name]) : '';
		if (!preg_match('/^(0\d{9}|\+840\d{9}|\+84[1-9]\d{8})$/', $sdt)) {
			$result->invalidate($tag, 'Số điện thoại không hợp lệ.');
		}
	}
	return $result;
}

/**
 * Inject hidden scroll-tracking field into every CF7 form.
 */
add_filter('wpcf7_form_elements', 'cwp_check_scroll_form_cf7');
function cwp_check_scroll_form_cf7($html) {
	$html = '<div style="display: none"><p><span class="wpcf7-form-control-wrap" data-name="cwp-scroll"><input size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" value="0" type="text" name="cwp-scroll"></span></p></div>' . $html;
	return $html;
}

/**
 * Validate scroll value – reject submissions with little/no scroll.
 */
add_filter('wpcf7_posted_data', 'cwp_check_scroll_form_cf7_vaild');
function cwp_check_scroll_form_cf7_vaild($posted_data) {
	$submission = WPCF7_Submission::get_instance();
	$scroll = isset($posted_data['cwp-scroll']) ? intval($posted_data['cwp-scroll']) : 0;
	//nếu form ở ngay trên đầu page thì thay 5000 thành số nhỏ hơn. ví dụ 200
	if (!$scroll || $scroll <= 200) {
		$submission->set_status( 'spam' );
		$submission->set_response( 'You are spamer' );
	}
	unset($posted_data['cwp-scroll']);
	return $posted_data;
}

/**
 * Front-end JS that accumulates scroll distance into the hidden field.
 */
add_action('wp_footer', 'cwp_antispam_scroll_script');
function cwp_antispam_scroll_script() {
	?>
	<script>
		const scrollInputs = document.querySelectorAll('input[name="cwp-scroll"]');
		if(scrollInputs.length > 0) {
			let accumulatedScroll = 0;
			function cwpCheckScroll() {
				accumulatedScroll += window.scrollY;
				scrollInputs.forEach(input => {
					input.value = accumulatedScroll;
				});

				//nếu form ở ngay trên đầu page thì thay 6000 thành số nhỏ hơn. ví dụ 300
				if (accumulatedScroll >= 200) {
					window.removeEventListener('scroll', cwpCheckScroll);
				}
			}
			window.addEventListener('scroll', cwpCheckScroll);
		}
	</script>
	<?php
}

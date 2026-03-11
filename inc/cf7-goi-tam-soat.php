<?php
/**
 * Contact Form 7 – Dynamic "goi_tam_soat" select field.
 *
 * Populates the select from 'goi_dieu_tri' posts, validates submissions,
 * and auto-selects the current post on singular pages.
 */

/**
 * Shared helper: get goi_dieu_tri posts for the current context.
 *
 * @return WP_Post[]
 */
function cwp_get_goi_dieu_tri_posts() {
	global $post;

	$current_taxonomy = get_queried_object();

	// Taxonomy archive page
	if (is_tax('dm_goi_dieu_tri') && $current_taxonomy && isset($current_taxonomy->term_id)) {
		$posts = get_posts(array(
			'post_type'      => 'goi_dieu_tri',
			'posts_per_page' => -1,
			'no_found_rows'  => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'dm_goi_dieu_tri',
					'field'    => 'term_id',
					'terms'    => $current_taxonomy->term_id,
				),
			),
		));
		if (!empty($posts)) {
			return $posts;
		}
	}

	// Single goi_dieu_tri page – get siblings from the same taxonomy
	if (is_singular('goi_dieu_tri') && $post) {
		$terms = get_the_terms($post->ID, 'dm_goi_dieu_tri');
		if (!empty($terms) && is_array($terms)) {
			$term_ids = wp_list_pluck($terms, 'term_id');
			$posts = get_posts(array(
				'post_type'      => 'goi_dieu_tri',
				'posts_per_page' => -1,
				'no_found_rows'  => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'dm_goi_dieu_tri',
						'field'    => 'term_id',
						'terms'    => $term_ids,
					),
				),
			));
			if (!empty($posts)) {
				return $posts;
			}
		}
	}

	// Fallback – all posts
	return get_posts(array(
		'post_type'      => 'goi_dieu_tri',
		'posts_per_page' => -1,
		'no_found_rows'  => true,
	));
}

/**
 * Populate the CF7 select tag named 'goi_tam_soat'.
 */
add_filter('wpcf7_form_tag', 'cwp_cf7_taxonomy_select', 10, 2);
function cwp_cf7_taxonomy_select($tag, $unused) {
	if (empty($tag['name']) || $tag['name'] !== 'goi_tam_soat') {
		return $tag;
	}

	$posts = cwp_get_goi_dieu_tri_posts();

	if (!empty($posts)) {
		foreach ($posts as $p) {
			$title = get_the_title($p->ID);
			$tag['raw_values'][] = $title;
			$tag['values'][]     = $title;
			$tag['labels'][]     = $title;
		}
	} else {
		$default = 'Không có gói tầm soát';
		$tag['raw_values'][] = $default;
		$tag['values'][]     = $default;
		$tag['labels'][]     = $default;
	}

	// Auto-select current post on single pages
	if (is_singular('goi_dieu_tri') && !empty($tag['values'])) {
		$current_post_title = get_the_title();
		if (in_array($current_post_title, $tag['values'])) {
			$tag['defaults'][] = $current_post_title;
		}
	}

	return $tag;
}

/**
 * Output current post title as JS variable for front-end auto-selection.
 */
add_action('wp_footer', 'cwp_output_current_post_title');
function cwp_output_current_post_title() {
	if (is_singular('goi_dieu_tri')) {
		$current_post_title = get_the_title();
		if (!empty($current_post_title)) {
			echo '<script>var cwpCurrentPostTitle = "' . esc_js($current_post_title) . '";</script>';
		}
	}
}

/**
 * Server-side validation for 'goi_tam_soat' select field.
 */
add_filter('wpcf7_validate_select', 'cwp_validate_goi_tam_soat', 10, 2);
add_filter('wpcf7_validate_select*', 'cwp_validate_goi_tam_soat', 10, 2);
function cwp_validate_goi_tam_soat($result, $tag) {
	if ($tag->name !== 'goi_tam_soat') {
		return $result;
	}

	$value = isset($_POST['goi_tam_soat']) ? sanitize_text_field($_POST['goi_tam_soat']) : '';

	if (empty($value)) {
		return $result;
	}

	$posts       = cwp_get_goi_dieu_tri_posts();
	$valid_titles = wp_list_pluck($posts, 'post_title');

	if (!empty($valid_titles) && !in_array($value, $valid_titles)) {
		$result->invalidate($tag, 'Vui lòng chọn gói tầm soát hợp lệ.');
	}

	if (empty($valid_titles) && $value !== 'Không có gói tầm soát') {
		$result->invalidate($tag, 'Hiện tại không có gói tầm soát nào khả dụng.');
	}

	return $result;
}

<?php

/**
 * Studio Val functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Studio Val
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

// === Theme setup ===
function studio_setup()
{
	// == Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// == Let WordPress manage the document title.
	add_theme_support('title-tag');

	// == Enable post thumbnails on posts and pages
	add_theme_support('post-thumbnails');

	// == Register menus
	register_nav_menus(
		array(
			'header-menu' => esc_html__("Header menu", 'studio-val'),
			'footer-menu' => esc_html__("Footer menu", 'studio-val'),
			'footer-socials' => esc_html__("Footer socials", 'studio-val'),
			'footer-legal' => esc_html__("Footer legal", 'studio-val')
		)
	);

	// == Switch default core markup for search form, comment form, and comments
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// == Add support for core custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'studio_setup');


// === Enqueue styles and scripts ===
function studio_scripts()
{
	// == CSS
	wp_enqueue_style('studio-val-styles', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);

	// == "All pages" JS scripts
	wp_enqueue_script('studio-header', get_template_directory_uri() . '/assets/js/header.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-reviews-list', get_template_directory_uri() . '/assets/js/reviews-list.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-reviews-blog-posts-slider', get_template_directory_uri() . '/assets/js/blog-posts-slider.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-references-slider', get_template_directory_uri() . '/assets/js/references-slider.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-input', get_template_directory_uri() . '/assets/js/input.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-projects-gallery', get_template_directory_uri() . '/assets/js/projects-gallery.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-block-back-to-top', get_template_directory_uri() . '/assets/js/back-to-top.js', array(), _S_VERSION, true);


	// == Single templates JS scripts
	if (is_single()) {
		// Single scripts
		wp_enqueue_script('studio-single-headings', get_template_directory_uri() . '/assets/js/single-headings.js', array(), _S_VERSION, true);
		wp_enqueue_script('studio-single-sidebar', get_template_directory_uri() . '/assets/js/single-sidebar.js', array(), _S_VERSION, true);
	}

	if (is_singular('portfolio')) {
		// Single-portfolio scripts
		wp_enqueue_script('studio-single-portfolio', get_template_directory_uri() . '/assets/js/single-portfolio.js', array(), _S_VERSION, true);
	}

	if (is_home() || is_category() || is_archive()) {
		wp_enqueue_script('gsap-blog', get_template_directory_uri() . '/assets/js/gsap-blog.js', array('gsap-cdn'), _S_VERSION, true);
	}

	// == GSAP
	wp_enqueue_script('gsap-cdn', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('gsap-scroll-trigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-cdn'), _S_VERSION, true);
	wp_enqueue_script('gsap-file', get_template_directory_uri() . '/assets/js/gsap.js', array('gsap-cdn'), _S_VERSION, true);


	// == GSAP for front page only
	if (is_front_page()) {
		wp_enqueue_script('gsap-front-page', get_template_directory_uri() . '/assets/js/gsap-front-page.js', array('gsap-cdn'), _S_VERSION, true);
	}

	// == Comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'studio_scripts');


// === Custom theme functions ===


// == Load autoload.php for dependencies
if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
	require_once get_template_directory() . '/vendor/autoload.php';
}


// == Allow Gutenberg editor on posts but not on pages, only if ACF page template is selected
function studio_disable_block_editor($use_block_editor, $post_type)
{
	// = Get current page template
	$template = basename(get_page_template());

	if ('page' === $post_type && ($template === "template-acf.php" || $template === "template-maintenance-form.php" || $template === "template-contact-page.php")) {
		return false;
	}
	return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'studio_disable_block_editor', 10, 2);


// == Define graphic blocks
function studio_define_graphic_block($color, $size)
{
	// Allowed colors and sizes
	$allowed_colors = ['dark', 'primary'];
	$allowed_sizes = ['large', 'medium', 'small'];

	// Validate color and size
	if (!in_array($color, $allowed_colors) || !in_array($size, $allowed_sizes)) {
		return "Error: Invalid color or size specified for a block.";
	}

	// Return block properties as an array
	return [
		'color' => $color,
		'size' => $size
	];
}
// == Generate graphic blocks
function studio_generate_graphic_blocks($blocks)
{
	// Ensure there are at least 2 blocks
	if (count($blocks) < 2) {
		return "Error: There must be at least 2 blocks.";
	}

	// Start generating blocks
	$output = '<div class="st-graphic-blocks">';

	foreach ($blocks as $block) {
		$output .= '<div class="st-block ' . $block['color'] . ' ' . $block['size'] . '"></div>';
	}

	$output .= '</div>';

	return $output;
}


// == Include dashicons library
function studio_enqueue_dashicons()
{
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'studio_enqueue_dashicons');


// == Get post thumbnail alt
function get_the_post_thumbnail_alt($thumbnail_id)
{
	$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

	return $alt;
}


// == Custom excerpt length
function studio_custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'studio_custom_excerpt_length', 999);

// == Long excerpt
function studio_long_excerpt($length = 55)
{
	global $post;

	$original_excerpt_length = apply_filters('excerpt_length', 20);

	// == Temporarily change the excerpt length
	add_filter('excerpt_length', function () use ($length) {
		return $length;
	}, 999);

	// Get the excerpt with the new length
	$excerpt = get_the_excerpt($post);

	// Restore the original excerpt length filter
	add_filter('excerpt_length', function () use ($original_excerpt_length) {
		return $original_excerpt_length;
	}, 999);

	return $excerpt;
}


// Customize "Read More" text
function studio_custom_excerpt_more($more)
{
	return ' ...';
}
add_filter('excerpt_more', 'studio_custom_excerpt_more');



// == Add extra fields to the "Contact Info" section on the user profile page.
add_filter('user_contactmethods', 'add_extra_contact_fields', 10, 1);

function add_extra_contact_fields($contactmethods)
{
	$contactmethods['linkedin'] = 'LinkedIn profile';
	$contactmethods['x'] = 'X profile';
	$contactmethods['threads'] = 'Threads profile';

	return $contactmethods;
}


// == Add extra information fields above the "Biographical Info" section on the user profile page.
add_action('show_user_profile', 'add_extra_information_fields');
add_action('edit_user_profile', 'add_extra_information_fields');

function add_extra_information_fields($user)
{
?>
	<h3><?php _e('Extra Information', 'studio-val'); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="company"><?php _e('Company', 'studio-val'); ?></label></th>
			<td>
				<input type="text" name="company" id="company" value="<?php echo esc_attr(get_the_author_meta('company', $user->ID)); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Enter your company name.', 'studio-val'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="position"><?php _e('Position', 'studio-val'); ?></label></th>
			<td>
				<input type="text" name="position" id="position" value="<?php echo esc_attr(get_the_author_meta('position', $user->ID)); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Enter your position.', 'studio-val'); ?></span>
			</td>
		</tr>
	</table>
<?php
}

// == Hook to save extra fields when user profile is updated
add_action('personal_options_update', 'save_extra_information_fields');
add_action('edit_user_profile_update', 'save_extra_information_fields');

function save_extra_information_fields($user_id)
{
	if (!current_user_can('edit_user', $user_id)) {
		return false;
	}

	update_user_meta($user_id, 'company', sanitize_text_field($_POST['company']));
	update_user_meta($user_id, 'position', sanitize_text_field($_POST['position']));
}

// === Remove WordPress auto-redirect
remove_action('template_redirect', 'redirect_canonical');


// == Save ACF fields in acf-json folder
function studio_acf_export_json($path)
{
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}
add_filter('acf/settings/save_json', 'studio_acf_export_json');


// == Edit RankMath breadscrumbs: edit category slug
add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs, $class) {
	// Loop through each breadcrumb item
	foreach ($crumbs as $crumb) {
		// Check if it's a category breadcrumb
		if (is_category() && strpos($crumb[1], '/blog/') === false) {
			// Prefix the slug with '/blog/'
			$crumb[1] = home_url('/blog/') . untrailingslashit(str_replace(home_url(), '', $crumb[1]));
		}
	}

	return $crumbs;
}, 10, 2);

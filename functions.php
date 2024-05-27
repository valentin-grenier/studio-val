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
	wp_enqueue_style('studio-val-style', get_stylesheet_uri(), array(), _S_VERSION);

	// == JS
	wp_enqueue_script('studio-navigation', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-references-slider', get_template_directory_uri() . '/js/references-slider.js', array(), _S_VERSION, true);
	wp_enqueue_script('studio-reviews-list', get_template_directory_uri() . '/js/reviews-list.js', array(), _S_VERSION, true);

	// == Comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'studio_scripts');


// === Custom theme functions ===


// == Load autoload.php for dependencies
require_once get_template_directory() . '/vendor/autoload.php';


// == Allow Gutenberg editor on posts but not on pages, only if ACF page template is selected
function studio_disable_block_editor($use_block_editor, $post_type)
{
	// = Get current page template
	$template = basename(get_page_template());

	if ('page' === $post_type && $template === "template-acf.php") {
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
		'color' => $color, 'size' => $size
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

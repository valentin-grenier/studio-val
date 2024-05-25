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
function studio_val_setup()
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
add_action('after_setup_theme', 'studio_val_setup');


// === Enqueue styles and scripts ===
function studio_val_scripts()
{
	// == CSS
	wp_enqueue_style('studio-val-style', get_stylesheet_uri(), array(), _S_VERSION);

	// == JS
	wp_enqueue_script('studio-val-navigation', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true);

	// == Comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'studio_val_scripts');


// === Custom theme functions ===

// == Custom button
function get_custom_button($buttonArray)
{
	$text = $buttonArray['text'] ?? "";
	$link = $buttonArray['link']['url'] ?? "#";
	$link_target = $buttonArray['link']['target'] ?? "_self";
	$color = $buttonArray['color'] ?? "dark";

	$button = '<div class="st-button ' . $color . '">';
	$button .= '<a href="' . $link . '" target="' . $link_target . '">' . $text . '</a>';
	$button .= '</div>';

	return $button;
}

// == Allow Gutenberg editor on posts but not on pages
function mgc_gutenberg_filter($use_block_editor, $post_type)
{
	if ('page' === $post_type) {
		return false;
	}
	return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'mgc_gutenberg_filter', 10, 2);

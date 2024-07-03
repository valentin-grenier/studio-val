<?php

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Studio Val
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Swiper CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Aller au contenu', 'studio-val'); ?></a>

		<header class="st-header hidden <?php echo is_user_logged_in() ? "logged-in" : ""; ?>">
			<nav class="st-header__navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
					)
				);
				?>
			</nav>
		</header>
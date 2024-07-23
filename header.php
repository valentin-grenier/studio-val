<?php

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Studio Val
 */

$logo = file_get_contents(get_template_directory_uri() . '/assets/svg/logo-studio-val-light.svg');
$burger_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/burger.svg');
$arrow_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/arrow.svg');

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

		<header class="st-header <?php echo is_user_logged_in() ? "logged-in" : ""; ?>">

			<?php if ($logo) : ?>
				<a class="st-header__logo" href="/">
					<?php echo $logo; ?>
				</a>
			<?php endif; ?>

			<?php if ($burger_icon) : ?>
				<button class="st-header__burger" aria-label="Ouvrir le menu mobile">
					<div></div>
					<div></div>
					<div></div>
				</button>
			<?php endif; ?>

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

		<div class="st-cursor">
			<?php echo $arrow_icon; ?>
		</div>
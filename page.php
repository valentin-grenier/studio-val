<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();
?>

<main id="content" class="st-main">

	<section class="st-page">
		<h1><?= the_title() ?></h1>
		<?= the_content() ?>
	</section>

</main>

<?php
get_footer();

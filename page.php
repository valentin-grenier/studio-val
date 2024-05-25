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

<main id="content" class="st-page">

	<?php
	if (have_rows('acf-pagebuilder')) :
		while (have_rows('acf-pagebuilder')) : the_row();

			include 'components/' . get_row_layout() . '.php';

		endwhile;
	else : ?>
		<section class="st-page">
			<h1><?= the_title() ?></h1>
			<?= the_content() ?>
		</section>
	<?php
	endif;
	?>

</main>

<?php
get_footer();

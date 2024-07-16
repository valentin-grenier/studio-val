<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Studio Val
 */

get_header();

// === Graphic blocks definition
$blocks = [
	studio_define_graphic_block('primary', 'large'),
	studio_define_graphic_block('dark', 'medium'),
];

?>

<main id="content" class="st-single">

	<?php
	while (have_posts()) :
		the_post();

		echo studio_generate_graphic_blocks($blocks);

		get_template_part('template-parts/single/single', 'thumbnail');
		get_template_part('template-parts/single/single', 'content');
		get_template_part('template-parts/single/single', 'related-posts');

		echo '<div class="st-link-notification">' . __('Lien copié dans le presse-papier', 'studio-val') . '</div>';
	endwhile;
	?>

</main>

<?php
get_footer();

<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Studio Val
 */

get_header();

?>

<main id="content" class="st-single">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/single/single', 'thumbnail');

		get_template_part('template-parts/single/single', 'content');

		get_template_part('template-parts/single/single', 'related-posts');



	endwhile;
	?>

</main>

<?php
get_footer();

<?php

/**
 * Template Name: ACF
 * The template for displaying pages built with custom ACf page builder
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();
?>

<main id="content" class="st-page-acf">
  <?php
  if (have_rows('acf-pagebuilder')) {
    while (have_rows('acf-pagebuilder')) {
      the_row();
      include 'template-parts/acf/' . get_row_layout() . '.php';
    }
  }
  ?>
</main>

<?php
get_footer();

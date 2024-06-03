<?php

/**
 * Template Name: Maintenance form
 * The dedicated page template for maintenance subscription
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();
?>

<main id="content" class="st-template-maintenance-form">
  <?php
  if (have_rows('acf-pagebuilder')) {
    while (have_rows('acf-pagebuilder')) {
      the_row();
      include 'template-parts/acf/' . get_row_layout() . '.php';
    }
  }
  ?>

  <section class="st-section boxed">
    <?php get_template_part('template-parts/form', 'maintenance'); ?>
  </section>
</main>

<?php
get_footer();

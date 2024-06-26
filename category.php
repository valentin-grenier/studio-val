<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'small'),
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('dark', 'medium'),
];

// === Get the current category
$category = get_queried_object();

// === Latests posts from a given category
$posts_args = array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
  'tax_query' => array(array(
    'taxonomy' => 'category',
    'field' => 'term_id',
    'terms' => $category->term_id,
  )),
);

$posts_query = new WP_Query($posts_args);

// === Icons
$icon_arrow = file_get_contents(get_template_directory_uri() . '/assets/svg/arrow-rounded.svg');

?>

<main id="content" class="st-blog category">

  <section class="st-section boxed st-blog__header">
    <h1><?php _e("Les articles à propos de <strong>$category->name</strong>", "studio-val"); ?></h1>
    <p><?php echo $category->description; ?></p>

    <?php get_template_part('template-parts/form', 'search'); ?>

    <?php echo studio_generate_graphic_blocks($blocks); ?>
  </section>

  <section class="st-section boxed st-blog__posts">
    <div class="st-blog__posts-list">
      <?php if ($posts_query->have_posts()) : ?>
        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
          <?php get_template_part('template-parts/card', 'post'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php
get_footer();

<?php
// == Assuming you have the current post ID or category ID to get related posts
$current_post_id = get_the_ID();

// == Get categories of the current post
$categories = get_the_category($current_post_id);

if ($categories) {
  $category_ids = array();
  foreach ($categories as $category) {
    $category_ids[] = $category->term_id;
  }

  // == Build arguments for WP_Query
  $related_posts_args = array(
    'post__not_in' => array($current_post_id),
    'posts_per_page' => 2,
    'category__in' => $category_ids,
    'orderby' => 'rand',
  );

  // == Query for related posts
  $related_posts_query = new WP_Query($related_posts_args);
}
?>

<?php if ($categories) : ?>
  <section class="st-single__related-posts st-section boxed">

    <h2><?php _e("Envie d'en <strong>savoir plus ?</strong>", "studio-val"); ?></h2>


    <?php if ($related_posts_query->have_posts()) : ?>
      <div class="st-single__related-posts--list">
        <?php while ($related_posts_query->have_posts()) : $related_posts_query->the_post(); ?>
          <?php get_template_part('template-parts/card', 'post'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <p><?php _e("Je suis en train d'écrire les prochains articles, patience !", "studio-val"); ?></p>
    <?php endif; ?>

  </section>
<?php endif; ?>
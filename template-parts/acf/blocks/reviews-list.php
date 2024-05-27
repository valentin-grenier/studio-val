<?php
// === ACF Data
$number_of_reviews = get_sub_field('number_of_reviews');

// === Retrieve reviews
$reviews_args = array(
  'post_type' => 'review',
  'posts_per_page' => $number_of_reviews,
  'orderby' => 'rand',
);

$reviews_query = new WP_Query($reviews_args);
?>

<div class="st-reviews-list swiper">
  <div class="swiper-wrapper">
    <?php if ($reviews_query->have_posts()) : ?>
      <?php while ($reviews_query->have_posts()) : $reviews_query->the_post(); ?>
        <?php get_template_part('template-parts/card', 'review'); ?>
      <?php wp_reset_postdata();
      endwhile ?>
    <?php endif; ?>

  </div>

  <div class="swiper-buttons">
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div>
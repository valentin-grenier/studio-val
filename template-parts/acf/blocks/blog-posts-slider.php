<?php
// === ACF Data
$title = get_sub_field('title');
$number_of_posts = get_sub_field('number_of_posts');
$button = get_sub_field('button');

// === Retrieve blog posts
$posts_args = array(
  'post_type' => 'post',
  'posts_per_page' => $number_of_posts,
  'orderby' => 'date',
  'order' => 'DESC'
);

$posts_query = new WP_Query($posts_args);
?>

<div class="st-blog-posts-slider swiper">
  <?php if ($title) : ?>
    <div class="st-blog-posts-slider__title">
      <?php echo $title; ?>
    </div>
  <?php endif; ?>
  <div class="swiper-wrapper">
    <?php if ($posts_query->have_posts()) : ?>
      <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
        <?php get_template_part('template-parts/card', 'post', array('is-slider' => true)); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <?php if ($button) : ?>
    <?php get_template_part('template-parts/button', null, $button); ?>
  <?php endif; ?>
</div>
<?php
// === ACF Data
$has_title = get_sub_field('has_title');
$title = get_sub_field('title');
$number_of_sliders = get_sub_field('number_of_sliders');
$remove_margins = get_sub_field('remove_margins');

// === Retrieve references logos
$references_args = array(
  'post_type' => 'reference',
  'posts_per_page' => 15,
  'orderby' => 'rand'
);

$references_query = new WP_Query($references_args);
?>

<div class="st-references-slider swiper <?php echo $remove_margins ? "no-margins" : "has-margins"; ?>">
  <div class="st-references-slider__container swiper-wrapper">
    <?php if ($references_query->have_posts()) : ?>
      <?php while ($references_query->have_posts()) : ?>
        <?php $references_query->the_post(); ?>
        <?php $logo = get_field('logo'); ?>
        <?php if ($logo) : ?>
          <div class="st-references-slider__slide swiper-slide">
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_html($logo['alt']); ?>">
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>
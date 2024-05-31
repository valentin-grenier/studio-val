<?php
// === ACF Data
$partners_type = get_sub_field('partners_type');
$partners_name = get_term($partners_type);

// === Retrieve partners
$partners_args = array(
  'post_type'       => 'partner',
  'posts_per_page'  => -1,
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'tax_query' => array(
    array(
      'taxonomy' => 'partner-type',
      'field'    => 'term_id',
      'terms'    => $partners_type,
    ),
  ),
);

$partners_query = new WP_Query($partners_args);
?>

<div class="st-partners-list <?php echo esc_attr($partners_name->slug); ?>">
  <?php if ($partners_query->have_posts()) : ?>
    <?php while ($partners_query->have_posts()) : $partners_query->the_post(); ?>
      <?php get_template_part('template-parts/card', 'partner'); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
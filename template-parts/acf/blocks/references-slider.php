<?php
// === ACF Data
$has_title = get_sub_field('has_title');
$title = get_sub_field('title');
$number_of_sliders = get_sub_field('number_of_sliders');
$remove_margins = get_sub_field('remove_margins');
$filter_by_taxonomy = get_sub_field('filter_by_taxonomy');
$taxonomy = get_sub_field('selected_taxonomy');

// === Retrieve references logos
$references_args = array(
  'post_type' => 'reference',
  'posts_per_page' => 15,
  'orderby' => 'rand'
);

/// === Add tax_query conditionally
if ($filter_by_taxonomy) {
  // == Get the term object for the selected taxonomy
  $selected_term = get_term_by('slug', $taxonomy->slug, 'service-type');

  if ($selected_term) {
    // == Initialize the terms array with the selected term's ID
    $terms = array($selected_term->term_id);

    // == Check if the selected term has a parent (i.e., it is a child term)
    if ($selected_term->parent != 0) {
      $child_terms = get_terms(array(
        'taxonomy'   => 'service-type',
        'parent'     => $selected_term->term_id,
        'hide_empty' => false,
      ));

      // == Add child term IDs to the terms array
      if (!is_wp_error($child_terms) && !empty($child_terms)) {
        $child_term_ids = wp_list_pluck($child_terms, 'term_id');
        $terms = array_merge($terms, $child_term_ids);
      }
    }

    // == Set up the tax_query
    $references_args['tax_query'] = array(
      array(
        'taxonomy' => 'service-type',
        'field'    => 'term_id',
        'terms'    => $terms,
        'include_children' => false,
      ),
    );
  }
}


$references_query = new WP_Query($references_args);
?>

<?php if ($references_query->post_count >= 9) : ?>
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
<?php else : ?>
  <div class="st-references-slider grid <?php echo $remove_margins ? "no-margins" : "has-margins"; ?>">
    <?php if ($references_query->have_posts()) : ?>
      <?php while ($references_query->have_posts()) : ?>
        <?php $references_query->the_post(); ?>
        <?php $logo = get_field('logo'); ?>
        <?php if ($logo) : ?>
          <div class="st-references-slider__item">
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_html($logo['alt']); ?>">
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
<?php endif; ?>
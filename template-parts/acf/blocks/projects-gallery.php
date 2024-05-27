<?php
// === ACF Data
$has_filter_buttons = get_sub_field('has_filter_buttons');
$number_of_projects = get_sub_field('number_of_projects');
$has_button = get_sub_field('has_button');
$button = get_sub_field('button');
$filter_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/filter.svg');

// === Retrieve post type taxonomies
$terms = get_terms(array(
  'taxonomy' => 'service-type',
  'hide_empty' => true,
  'orderby' => 'menu_order',
));

// === Retrieve projects
$projects_args = array(
  'post_type' => 'reference',
  'posts_per_page' => $number_of_projects,
  'post_status' => 'published',
  'orderby' => 'date',
  'order' => 'DESC',
);

$projects_query = new WP_Query($projects_args);

?>

<div class="st-projects-gallery">
  <?php if ($has_filter_buttons) : ?>
    <div class="st-projects-gallery__filters">
      <?php echo $filter_icon; ?>
      <button aria-label="Afficher tous les projets" class="active">
        <?php echo _e('Tout afficher', 'studio-val'); ?>
      </button>

      <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
          <button aria-label="<?php echo $term->name; ?>">
            <?php echo $term->name; ?>
          </button>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <div class="st-projects-gallery__list">
    <?php if ($projects_query->have_posts()) : ?>
      <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
        <?php get_template_part('template-parts/card', 'project'); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <?php if ($has_button) : ?>
    <?php get_template_part('template-parts/button', null, $button); ?>
  <?php endif; ?>
</div>
<?php
// === ACF Data
$has_filter_buttons = get_sub_field('has_filter_buttons');
$number_of_projects = get_sub_field('number_of_projects');
$has_button = get_sub_field('has_button');
$button = get_sub_field('button');
$filter_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/filter.svg');
$filter_by_taxonomy = get_sub_field('filter_by_taxonomy');
$taxonomy = get_sub_field('selected_taxonomy');

// === Retrieve post type taxonomies
$terms = get_terms(array(
  'taxonomy' => 'service-type',
  'hide_empty' => true,
  'orderby' => 'menu_order',
  'parent' => 0
));

// === Retrieve projects
$projects_args = array(
  'post_type'      => 'portfolio',
  'posts_per_page' => $number_of_projects !== "" ? $number_of_projects : -1,
  'post_status'    => 'publish',
  'orderby'        => 'date',
  'order'          => 'DESC',
);

// === Add tax_query conditionally
if ($filter_by_taxonomy) {
  $projects_args['tax_query'] = array(
    array(
      'taxonomy' => 'service-type',
      'field'    => 'slug',
      'terms'    => $taxonomy->slug,
    ),
  );
}

$projects_query = new WP_Query($projects_args);

?>

<div class="st-projects-gallery">
  <?php if ($has_filter_buttons) : ?>
    <div class="st-projects-gallery__filters">
      <?php echo $filter_icon; ?>
      <button aria-label="Afficher tous les projets" class="active" data-filter="all">
        <?php echo _e('Tout afficher', 'studio-val'); ?>
      </button>

      <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
          <button aria-label="<?php echo $term->name; ?>" data-filter="<?php echo esc_attr($term->slug); ?>">
            <?php echo $term->name; ?>
          </button>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <div class="st-projects-gallery__list">
    <?php if ($projects_query->have_posts()) : ?>
      <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
        <?php $description = get_field('subtitle'); ?>

        <?php
        // == Get parent terms
        $terms = get_the_terms(get_the_ID(), 'service-type');
        $parent_terms = array_filter($terms, function ($term) {
          return $term->parent === 0;
        });
        $parent_terms_names = array_map(function ($term) {
          return $term->name;
        }, $parent_terms);

        $category = "";
        foreach ($parent_terms as $parent_term) {
          $category .= remove_accents(strtolower($parent_term->name)) . ' ';
        }

        $category = rtrim($category);
        ?>

        <?php get_template_part('template-parts/card', 'project', array('description' => $description, 'category' => $category)); ?>
      <?php wp_reset_postdata();
      endwhile; ?>
    <?php endif; ?>
  </div>

  <?php if ($has_button) : ?>
    <?php get_template_part('template-parts/button', null, $button); ?>
  <?php endif; ?>
</div>
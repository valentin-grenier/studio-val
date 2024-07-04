<?php

/**
 * The template for displaying single custom post types from "Reference"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Studio Val
 */

get_header();

// === Button back data
$button_back_data = [
  'text' => __('Retour aux réalisations', 'studio-val'),
  'link' => '/portfolio',
];

// === ACF Data
$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');
$gallery = get_field('gallery');
$services = get_field('list_items');
$technologies = get_field('technologies');
$logo = get_field('logo');
$project_link = get_field('project_link');
$thumbnail_url = get_the_post_thumbnail_url();

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('dark', 'medium'),
  studio_define_graphic_block('dark', 'large'),
];
?>

<main class="st-single-reference">
  <section class="st-section boxed st-single-reference__header">
    <div class="st-single-reference__header--content">
      <?php get_template_part('template-parts/button', 'back', $button_back_data); ?>
      <h1><?php echo $title; ?></h1>
      <span><?php echo $subtitle; ?></span>
      <p><?php echo $text; ?></p>
    </div>

    <div class="st-single-reference__header--logo">
      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
      <?php get_template_part('template-parts/button', null, $project_link); ?>
    </div>

    <?php echo studio_generate_graphic_blocks($blocks); ?>
  </section>

  <?php if ($gallery) : ?>
    <section class="st-section boxed st-single-reference__gallery swiper">
      <div class="swiper-wrapper">
        <?php foreach ($gallery as $image) : ?>
          <div class="st-single-reference__gallery--item swiper-slide">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-buttons absolute">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

      <div class="swiper-pagination"></div>
    </section>
  <?php endif; ?>


  <section class="st-section boxed st-single-reference__details">
    <?php if ($services) : ?>
      <div class="st-single-reference__details--list">
        <h2><?php _e('Le projet <strong>en détail</strong>', 'studio-val'); ?></h2>
        <?php
        $services_data['list_items'] = $services;
        ?>
        <?php get_template_part('template-parts/list', null, $services_data); ?>
      </div>
    <?php endif; ?>

    <?php if ($technologies) : ?>
      <div class="st-single-reference__details--technologies">
        <h2><?php _e('Technologies <strong>utilisées</strong>', 'studio-val'); ?></h2>
        <ul>
          <?php foreach ($technologies as $technology) : ?>
            <li>
              <img src="/wp-content/themes/studio-val/assets/svg/technologies/<?php echo esc_attr($technology['value']); ?>.svg" alt="<?php echo esc_attr($technology['label']); ?>">
              <span><?php echo $technology['label']; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </section>

  <?php // === Include custom blocks for the rest of the page
  if (have_rows('acf-pagebuilder')) {
    while (have_rows('acf-pagebuilder')) {
      the_row();
      include 'template-parts/acf/' . get_row_layout() . '.php';
    }
  }
  ?>

</main>

<?php
get_footer();

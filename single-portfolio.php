<?php

/**
 * The template for displaying single custom post types from "Reference"
 * 
 * Template Name: Developpement
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
$cta_title = get_field('cta_title');
$cta_content = get_field('cta_content');
$button = get_field('button');

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('dark', 'medium'),
];

// === Retrieve other projects
$other_projects_args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => 4,
  'orderby' => 'date',
  'order' => 'DESC',
  'post_status' => 'publish',
  'post__not_in' => array(get_the_ID()),
);

$other_projects_query = new WP_Query($other_projects_args);
?>

<main class="st-single-portfolio">
  <section class="st-section boxed st-single-portfolio__header">
    <div class="st-single-portfolio__header--content">
      <?php get_template_part('template-parts/button', 'back', $button_back_data); ?>
      <h1><?php echo $title; ?></h1>
      <span><?php echo $subtitle; ?></span>
      <p><?php echo $text; ?></p>
    </div>

    <?php if ($thumbnail_url) : ?>
      <div class="st-single-portfolio__header--logo">
        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
        <?php if ($project_link['text'] !== "") : ?>
          <?php get_template_part('template-parts/button', null, $project_link); ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php echo studio_generate_graphic_blocks($blocks); ?>
  </section>

  <?php if ($gallery) : ?>
    <section class="st-section boxed st-single-portfolio__gallery swiper">
      <div class="swiper-wrapper">
        <?php foreach ($gallery as $image) : ?>
          <div class="st-single-portfolio__gallery--item swiper-slide">
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


  <?php if ($services || $technologies) : ?>
    <section class="st-section boxed st-single-portfolio__details">
      <?php if ($services) : ?>
        <div class="st-single-portfolio__details--list">
          <h2><?php _e('Le projet <strong>en détail</strong>', 'studio-val'); ?></h2>
          <?php
          $services_data['list_items'] = $services;
          ?>
          <?php get_template_part('template-parts/list', null, $services_data); ?>
        </div>
      <?php endif; ?>

      <?php if ($technologies) : ?>
        <div class="st-single-portfolio__details--technologies">
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
  <?php endif; ?>


  <?php if ($cta_title) : ?>
    <section class="st-single-portfolio__cta st-section boxed">
      <div class="st-callout-block">
        <div class="st-callout-block__content">
          <h2 style="text-align: center;"><?php echo $cta_title; ?></h2>
          <p style="text-align: center;"><?php echo $cta_content; ?></p>
        </div>

        <div class="st-callout-block__buttons">
          <?php if ($button) : ?>
            <?php get_template_part('template-parts/button', null, $button); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="st-single-portfolio__other-projects st-section boxed">
    <h2><?php _e("Mes autres <strong>réalisations</strong>", "studio-val"); ?></h2>

    <div class="st-single-portfolio__other-projects--list">
      <?php if ($other_projects_query->have_posts()) : ?>
        <?php while ($other_projects_query->have_posts()) : $other_projects_query->the_post(); ?>
          <?php get_template_part('template-parts/card', 'project'); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php
get_footer();

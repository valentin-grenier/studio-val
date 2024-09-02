<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('primary', 'small'),
];

// === Latests posts
$posts_args = array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
);

$posts_query = new WP_Query($posts_args);

// === Categories
$categories = get_categories(array(
  'hide_empty' => false,
  'exclude' => get_cat_ID('Uncategorized')
));

// === Icons
$icon_arrow = file_get_contents(get_template_directory_uri() . '/assets/svg/arrow-rounded.svg');

// === Custom data
$cta = array(
  'title' => __('Partagez votre expertise ! 🖋️'),
  'text' => __('Vous avez une expertise ou une expérience à partager ? Enrichissez ce blog en contribuant avec un article ! Que vous souhaitiez partager des conseils, promouvoir vos services ou simplement échanger avec la communauté, je serais ravi d\'en discuter avec vous. Contactez-moi dès maintenant pour explorer cette opportunité de collaboration.', 'studio-val'),
  'button' => array(
    'text' => __('Ça m\'intéresse ! ❤️', 'studio-val'),
    'link' => array(
      'url' => '/contact',
      'target' => '_blank',
      'title' => 'Envoyez-moi une demande pour contribuer sur ce blog !'
    ),
    'color' => 'light',
  )
);
?>

<main id="content" class="st-blog">

  <section class="st-section boxed st-blog__header">
    <div class="st-blog__title">
      <h1><?php _e('<strong>Les actualités</strong> de Studio Val', 'studio-val'); ?></h1>
      <p><?php _e('Par un développeur WordPress, pour les développeurs WordPress !', 'studio-val'); ?></p>

    </div>

    <?php if ($posts_query->have_posts()) : ?>
      <?php $posts_query->the_post(); ?>
      <a class="st-blog__hero" href="<?php echo get_permalink(); ?>">
        <div class="st-blog__hero--image">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="st-blog__hero--content">

          <div class="st-blog__hero--text">
            <span class="label"><?php _e('Nouveau', 'studio-val'); ?></span>
            <h2><?php echo get_the_title(); ?></h2>
            <p><?php echo studio_long_excerpt(55); ?></p>
          </div>

          <div class="st-blog__hero--meta">
            <?php $hero_category = get_the_category(); ?>
            <span class="category" href="<?php echo $hero_category[0]->slug; ?>"><?php echo $hero_category[0]->name; ?></span>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
          </div>
        </div>
      </a>
    <?php endif; ?>

    <?php echo studio_generate_graphic_blocks($blocks); ?>
  </section>

  <section class="st-section boxed st-blog__posts">
    <h2><?php _e('Les articles <strong>récents</strong>', 'studio-val'); ?></h2>
    <div class="st-blog__posts-list">
      <?php if ($posts_query->have_posts()) : ?>
        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
          <?php get_template_part('template-parts/card', 'post'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>

  <section class="st-section boxed st-blog__cta">
    <div class="st-callout-block">
      <div class="st-callout-block__content">
        <h2><?php echo $cta['title']; ?></h2>
        <p><?php echo $cta['text']; ?></p>
      </div>
      <div class="st-callout-block__buttons">
        <?php get_template_part('template-parts/button', null, $cta['button']); ?>
      </div>

    </div>
  </section>

</main>

<?php
get_footer();

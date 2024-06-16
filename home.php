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
  studio_define_graphic_block('dark', 'medium'),
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

<main id="content" class="st-home">

  <section class="st-section boxed st-home__header">
    <h1><span>Studio Val</span><br /> <?php _e('Le blog du développement WordPress', 'studio-val'); ?></h1>
    <p><?php _e('Par un développeur WordPress, pour les développeurs WordPress !', 'studio-val'); ?></p>

    <?php get_template_part('template-parts/form', 'search'); ?>

    <?php echo studio_generate_graphic_blocks($blocks); ?>
  </section>

  <section class="st-section boxed st-home__posts">
    <h2><?php _e('Les dernières <strong>publications</strong>', 'studio-val'); ?></h2>
    <div class="st-home__posts-list">
      <?php if ($posts_query->have_posts()) : ?>
        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
          <?php get_template_part('template-parts/card', 'post'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>

  <section class="st-section boxed st-home__categories">
    <h2><?php _e('Sur ce blog, j\'écris à propos de <strong>ces sujets</strong>', 'studio-val'); ?></h2>
    <?php if (!empty($categories)) : ?>
      <div class="st-home__categories--list">
        <?php foreach ($categories as $category) : ?>
          <?php
          $image_type = get_field('image_type', 'category_', $category->term_id);
          $dashicon = get_field('dashicon', 'category_' . $category->term_id);
          $image = get_field('image', 'category_' . $category->term_id);
          ?>

          <a class="st-card" href="/blog/<?php echo esc_url($category->slug); ?>">
            <?php if (get_field('image_type') === "image") : ?>
              <img src="" alt="">
            <?php else : ?>
              <div class="st-card__dashicon">
                <span class="dashicons dashicons-<?php echo esc_attr($dashicon); ?>"></span>
              </div>
            <?php endif; ?>
            <span class="st-card__text"><?php echo $category->name ?></span>
            <span class=" st-card__link-icon"><?php echo $icon_arrow; ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <section class="st-section boxed st-home__cta">
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

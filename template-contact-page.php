<?php

/**
 * Template Name: Contact page
 * The dedicated page template for maintenance subscription
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio Val
 */

get_header();

// === ACF Data
$text = get_field('text');
$form_shortcode = get_field('form_shortcode');
$sidebar_blocks = [
  get_field('block_1'),
  get_field('block_2'),
];

$blocks = [
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('dark', 'medium'),
  studio_define_graphic_block('dark', 'large'),
];
?>

<main id="content" class="st-template-contact-page st-contact st-section boxed">

  <section class="st-section boxed st-contact__content">
    <?php echo $text; ?>

    <div class="st-contact__form">
      <?php echo do_shortcode($form_shortcode); ?>
    </div>
  </section>

  <aside class="st-contact__sidebar">
    <?php if (!empty($sidebar_blocks)) : foreach ($sidebar_blocks as $block) : ?>
        <div class="st-contact__block">
          <span><?php echo $block['title']; ?></span>
          <p><?php echo $block['text']; ?></p>

          <?php if (array_key_exists('social_networks', $block)) : ?>
            <div class="st-contact__block--socials">
              <?php foreach ($block['social_networks'] as $social) : ?>
                <a href="<?php echo esc_attr($social['link']['url']); ?>" title="<?php echo esc_attr($social['link']['title']); ?>" target="<?php echo esc_attr($social['link']['target']); ?>">
                  <?php if ($social['image']) : ?>
                    <img src="<?php echo esc_url($social['image']['url']) ?>" alt="<?php echo esc_attr($social['image']['alt']) ?>" />
                  <?php endif; ?>
                </a>
              <?php endforeach ?>
            </div>
          <?php endif; ?>


          <?php if (array_key_exists('button', $block)) : ?>
            <?php get_template_part('template-parts/button', null, $block['button']); ?>
          <?php endif; ?>

        </div>
    <?php endforeach;
    endif; ?>
  </aside>

  <?php echo studio_generate_graphic_blocks($blocks); ?>

</main>

<?php
get_footer();

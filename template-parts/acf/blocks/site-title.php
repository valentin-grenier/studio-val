<?php
// === ACF data
$animated_title = get_sub_field('animated_title');
$highlighted_words = explode(" ", $animated_title['words']);
$main_title = get_sub_field('main_title');
$button_1 = get_sub_field('button_1');
$button_2 = get_sub_field('button_2');

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'large'),
  studio_define_graphic_block('dark', 'large'),
  studio_define_graphic_block('dark', 'medium'),
  studio_define_graphic_block('primary', 'medium'),
];

$buttons = [
  $button_1,
  $button_2
];

?>

<div class="st-site-title">
  <div class="st-site-title__animated-title">
    <p>
      <?php echo $animated_title['title']; ?>
      <?php if ($highlighted_words) : foreach ($highlighted_words as $word) : ?>
          <span><?php echo $word ?></span>
      <?php endforeach;
      endif; ?>
    </p>
  </div>

  <div class="st-site-title__main-title">
    <h1><?php echo $main_title; ?></h1>
  </div>

  <div class="st-site-title__buttons">
    <?php foreach ($buttons as $button_data) : ?>
      <?php echo get_template_part('template-parts/button', null, $button_data); ?>
    <?php endforeach; ?>
  </div>

  <?php echo studio_generate_graphic_blocks($blocks); ?>
</div>
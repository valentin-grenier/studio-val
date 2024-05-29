<?php
// === ACF data
$title_layout = get_sub_field('title_layout');
$title = get_sub_field('title');
$title_first_line = get_sub_field('title_first_line');
$title_second_line = get_sub_field('title_second_line');

// === Graphic blocks definition
$blocks = [
  studio_define_graphic_block('primary', 'small'),
  studio_define_graphic_block('primary', 'medium'),
  studio_define_graphic_block('dark', 'small'),
];

?>

<div class="st-page-title">


  <?php if ($title_layout === "title") : ?>
    <div class="st-page-title__title">
      <?php echo $title; ?>
    </div>
  <?php else : ?>
    <div class="st-page-title__title-subtitle">
      <h1><?php echo $title_first_line; ?></h1>
      <p><?php echo $title_second_line; ?></p>
    </div>
  <?php endif; ?>


  <?php echo studio_generate_graphic_blocks($blocks); ?>
</div>
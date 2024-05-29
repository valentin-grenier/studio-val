<?php
// === ACF Data
$content = get_sub_field('content');
$number_of_buttons = get_sub_field('number_of_buttons');
$buttons = [
  $button_1 = get_sub_field('button_1')
];
if ($number_of_buttons > 1) {
  $button_2 = get_sub_field('button_2');
  $buttons[] = $button_2;
}
?>

<div class="st-callout-block">
  <?php if ($content) : ?>
    <div class="st-callout-block__content">
      <?php echo $content; ?>
    </div>
  <?php endif; ?>

  <?php if ($buttons && $number_of_buttons > 0) : ?>
    <div class="st-callout-block__buttons">

      <?php foreach ($buttons as $button) : ?>
        <?php if ($button !== null) : ?>
          <?php get_template_part('template-parts/button', null, $button); ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>
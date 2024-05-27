<?php
// === ACF Data
$title = get_sub_field('title');
$text = get_sub_field('text');
?>

<div class="st-title-text">
  <?php if ($title) : ?>
    <div class="st-title-text__title">
      <?php echo $title; ?>
    </div>
  <?php endif; ?>

  <?php if ($text) : ?>
    <div class="st-title-text__text">
      <?php echo $text; ?>
    </div>
  <?php endif; ?>
</div>
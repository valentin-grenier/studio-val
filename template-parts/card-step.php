<?php
$title = $args['title'] ?? null;
$text = $args['text'] ?? null;
$number = $args['number'] ?? null;
?>

<div class="st-card-step">
  <div class="st-card-step__number">
    <span><?php echo __('Étape', 'studio-val') . ' ' . esc_attr($number); ?></span>
  </div>

  <div class="st-card-step__title">
    <h3><?php echo $title; ?></h3>
  </div>

  <div class="st-card-step__text">
    <p><?php echo $text; ?></p>
  </div>
</div>
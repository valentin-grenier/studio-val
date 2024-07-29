<?php
// === ACF Data
$image = get_sub_field('image');
$text = get_sub_field('text');
$content_order = get_sub_field('content_order');
?>

<div class="st-text-image <?php echo esc_attr($content_order); ?>">
  <?php if ($image) : ?>
    <div class="st-text-image__image">
      <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
    </div>
  <?php endif; ?>

  <?php if ($text) : ?>
    <div class="st-text-image__text">
      <?php echo $text; ?>
    </div>
  <?php endif; ?>
</div>
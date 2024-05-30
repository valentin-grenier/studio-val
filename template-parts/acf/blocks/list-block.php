<?php
// === ACF Data
$list_items = get_sub_field('list_items');
$has_image = get_sub_field('has_image');
$image = get_sub_field('image');
$checkmark_icon = file_get_contents(get_template_directory_uri() . '/assets/Svg/checkmark.svg');
?>

<div class="st-list-block">
  <?php if ($list_items && count($list_items) > 0) : ?>
    <div class="st-list-block__list">
      <?php foreach ($list_items as $item) : ?>
        <div class="st-list-block__list--item">
          <span><?php echo $checkmark_icon; ?></span>
          <?php echo $item['content']; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($image) : ?>
    <div class="st-list-block__image">
      <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
    </div>
  <?php endif; ?>
</div>
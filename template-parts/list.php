<?php
$list_items = $args['list_items'] ?? null;
$has_image = $args['has_image'] ?? null;
$image = $args['image'] ?? null;
$checkmark_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/checkmark.svg');

?>

<div class="st-list-block">
  <?php if ($list_items && count($list_items) > 0) : ?>
    <ul class="st-list-block__list">
      <?php foreach ($list_items as $item) : ?>
        <li class="st-list-block__list--item">
          <span><?php echo $checkmark_icon; ?></span>
          <div>
            <?php echo $item['content']; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php if ($image) : ?>
    <div class="st-list-block__image">
      <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
    </div>
  <?php endif; ?>
</div>
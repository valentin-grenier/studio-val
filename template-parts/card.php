<?php
$has_image = $args['has_image'] ?? false;
$image_type = $args['image_type'] ?? '';
$image = $args['image'] ?? null;
$dashicons = $args['dashicons'] ?? '';
$text = $args['text'] ?? '';
$has_link = $args['has_link'] ?? false;
$link = $args['link'] ?? null;
$has_button = $args['has_button'] ?? false;
$button = $args['button'] ?? null;
$background_type = $args['background_type'] ?? null;
?>

<?php if (!$has_link) : ?>
  <div class="st-card <?php echo $background_type === "dark" ? "dark" : ""; ?>">
    <?php if ($has_image) : ?>
      <?php if ($image_type == 'image' && $image) : ?>
        <div class="st-card__image">
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
      <?php elseif ($image_type == 'dashicons' && $dashicons) : ?>
        <div class="st-card__dashicon">
          <span class="dashicons dashicons-<?php echo esc_attr($dashicons); ?>"></span>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="st-card__text"><?php echo $text; ?></div>
    <?php if ($has_button && $button) : ?>
      <?php echo get_template_part('template-parts/button', null, $button) ?>
    <?php endif; ?>
  </div>
<?php else : ?>
  <a class="st-card <?php echo $background_type === "dark" ? "dark" : ""; ?>" href="<?php echo $link['url'] ?>">
    <?php if ($has_image) : ?>
      <?php if ($image_type == 'image' && $image) : ?>
        <div class="st-card__image">
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
      <?php elseif ($image_type == 'dashicons' && $dashicons) : ?>
        <div class="st-card__dashicon">
          <span class="dashicons dashicons-<?php echo esc_attr($dashicons); ?>"></span>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="st-card__text"><?php echo $text; ?></div>
    <?php if ($has_button && $button) : ?>
      <?php echo get_template_part('template-parts/button', null, $button) ?>
    <?php endif; ?>

    <div class="st-card__link-icon">
      <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/arrow-rounded.svg'); ?>
    </div>
  </a>
<?php endif; ?>
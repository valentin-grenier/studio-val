<?php
$image = get_field('image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');
$link = get_field('link');
$link_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/arrow-rounded.svg');
?>

<?php if ($link) : ?>
  <a class="st-card-partner" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" title="<?php echo esc_attr($link['title']); ?>">
    <?php if ($image) : ?>
      <div class="st-card-partner__image">
        <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
      </div>
    <?php endif; ?>

    <div class="st-card-partner__content">
      <h3><?php echo esc_attr($title); ?></h3>
      <span><?php echo esc_attr($subtitle); ?></span>
      <p><?php echo esc_attr($text); ?></p>
    </div>
    <span class="st-card-partner__link-icon"><?php echo $link_icon; ?></span>
  </a>
<?php else : ?>
  <div class="st-card-partner">
    <?php if ($image) : ?>
      <div class="st-card-partner__image">
        <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
      </div>
    <?php endif; ?>

    <div class="st-card-partner__content">
      <h3><?php echo esc_attr($title); ?></h3>
      <span><?php echo esc_attr($subtitle); ?></span>
      <p><?php echo esc_attr($text); ?></p>
    </div>
  </div>
<?php endif; ?>
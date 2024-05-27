<?php
$text = $args['text'] ?? '';
$link = $args['link']['url'] ?? '#';
$link_target = $args['link']['target'] ?? '_self';
$color = $args['color'] ?? 'dark';
?>

<div class="st-button <?php echo esc_attr($color); ?>">
  <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
    <?php echo esc_html($text); ?>
  </a>
</div>
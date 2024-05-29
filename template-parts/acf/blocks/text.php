<?php
// === ACF Data
$text = get_sub_field('text_content');
$text_width = get_sub_field('text_width');

switch ($text_width) {
  case "100":
  default:
    $width = "width-100";
    break;

  case "75":
    $width = "width-75";
    break;

  case "50":
    $width = "width-50";
    break;
}
?>

<div class="st-text <?php echo esc_attr($width); ?>">
  <?php echo $text; ?>
</div>
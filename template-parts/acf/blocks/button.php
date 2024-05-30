<?php
$padding = get_sub_field('padding');
$alignment = get_sub_field('alignment');
$button = get_sub_field('button');
?>

<div class="padding-<?php echo esc_attr($padding); ?> align align-<?php echo esc_attr($alignment); ?>">
  <?php get_template_part('template-parts/button', null, $button); ?>
</div>
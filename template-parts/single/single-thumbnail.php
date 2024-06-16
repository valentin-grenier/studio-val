<?php
$thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
$thumbnail_alt = get_the_post_thumbnail_alt(get_the_ID());
?>

<section class="st-single__thumbnail st-section boxed">
  <?php if ($thumbnail_url) : ?>
    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>">
  <?php endif; ?>
</section>
<?php
$title = get_the_title();
$excerpt = get_the_excerpt();
$thumbnail_url = get_the_post_thumbnail_url();
$thumbnail_alt = get_the_post_thumbnail_alt(get_the_ID());
$permalink = get_permalink();
$arrow_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/arrow-rounded.svg');
?>

<a class="st-card-project" href="<?php echo $permalink; ?>">
  <div class="st-card-project__content">
    <?php if ($title) : ?>
      <h3><?php echo $title; ?></h3>
    <?php endif; ?>

    <?php if ($excerpt) : ?>
      <p><?php echo $excerpt; ?></p>
    <?php endif; ?>
    <?php echo $arrow_icon; ?>
  </div>

  <?php if ($thumbnail_url) : ?>
    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
  <?php endif; ?>
</a>
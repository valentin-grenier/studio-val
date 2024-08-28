<?php
$is_slider = $args['is-slider'] ?? null;
$title = get_the_title();
$excerpt = get_the_excerpt();
$category = get_the_category(get_the_ID());
$thumbnail_url = get_the_post_thumbnail_url();
$thumbnail_alt = get_the_post_thumbnail_alt(get_the_ID());
$permalink = get_permalink();

?>

<a class="st-card-post <?php echo $is_slider ? "swiper-slide" : ""; ?>" href="<?php echo esc_url($permalink); ?>">
  <div class="st-card-post__image">
    <?php if ($thumbnail_url) : ?>
      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>">
    <?php endif; ?>
  </div>
  <div class="st-card-post__content">
    <h3><?php echo $title; ?></h3>
    <p><?php echo $excerpt; ?></p>

    <div class="st-card-post__meta">
      <span class="category">
        <?php echo $category[0]->name; ?>
      </span>
      <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
    </div>
  </div>


</a>
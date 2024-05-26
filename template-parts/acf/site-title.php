<?php
// === ACF data
$animated_title = get_sub_field('animated_title');
$highlighted_words = explode(" ", $animated_title['words']);
$main_title = get_sub_field('main_title');
$button_1 = get_sub_field('button_1');
$button_2 = get_sub_field('button_2');
?>

<section class="st-site-title">
  <div class="st-site-title__animated-title">
    <p>
      <?php echo $animated_title['title']; ?>
      <?php if ($highlighted_words) : foreach ($highlighted_words as $word) : ?>
          <span><?php echo $word ?></span>
      <?php endforeach;
      endif; ?>
    </p>
  </div>

  <div class="st-site-title__main-title">
    <h1><?php echo $main_title; ?></h1>
  </div>

  <div class="st-site-title__buttons">
    <?php echo get_custom_button($button_1); ?>
    <?php echo get_custom_button($button_2); ?>
  </div>
</section>
<?php
$author = get_field('author');
$company = get_field('company');
$content = get_field('content');
?>

<div class="st-card-review swiper-slide">
  <div class="st-card-review__content">
    <?php echo $content; ?>
  </div>
  <div class="st-card-review__author">
    <p><span class="st-card-review__author--name"><?php echo $author; ?></span> - <?php echo $company; ?></p>
  </div>

</div>
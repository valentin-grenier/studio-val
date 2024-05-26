<?php
// === ACF Data
$layout = get_sub_field('layout');
$has_padding = get_sub_field('has_padding');

?>

<section class="st-section <?php echo $layout; ?> <?php echo $has_padding ? "has-padding" : "no-padding"; ?>">
  <?php
  if (have_rows('blocks')) {
    while (have_rows('blocks')) {
      the_row();
      include 'blocks/' . get_row_layout() . '.php';
    }
  }
  ?>
</section>
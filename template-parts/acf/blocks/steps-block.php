<?php
$steps = get_sub_field('steps');
?>

<div class="st-steps-block">
  <?php if ($steps) : ?>
    <?php $index = 1; ?>
    <?php foreach ($steps as $step) : ?>
      <?php
      $step['number'] = $index;
      get_template_part('template-parts/card', 'step', $step);
      $index++;
      ?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php
// === ACF Data
$cards_list = get_sub_field('cards_list');
?>

<div class="st-cards-numbers">
  <?php if ($cards_list) : ?>
    <?php foreach ($cards_list as $card) : ?>
      <div class="st-cards-numbers__card">
        <p>
          <span>+<?php echo $card['number']; ?></span>
          <?php echo $card['text'] ?>
        </p>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php
// === ACF Data
$cards_list = get_sub_field('cards_list');

?>

<div class="st-cards-list">
  <?php if ($cards_list) : ?>
    <?php foreach ($cards_list as $data) : ?>
      <?php
      // == Row data
      $card_data = [
        'has_image' => $data['card']['has_image'],
        'image_type' => $data['card']['image_type'],
        'image' => $data['card']['image'],
        'dashicons' => $data['card']['dashicons'],
        'text' => $data['card']['text'],
        'has_link' => $data['card']['has_link'],
        'link' => $data['card']['link'],
        'has_button' => $data['card']['has_button'],
        'button' => $data['card']['button'],
        'background_type' => $data['card']['background_type'],
      ];

      get_template_part('template-parts/card', null, $card_data);
      ?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
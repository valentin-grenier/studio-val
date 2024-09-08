<?php
// === ACF Data
$list = get_sub_field('list');
$bottom_content = get_sub_field('bottom_content');
?>

<div class="st-pricing-table">

  <?php if ($list) : ?>
    <div class="st-pricing-table__list">
      <?php foreach ($list as $item) : ?>
        <?php
        $offer_post_id = $item['offer']->ID;
        $card_content = get_field('card_content', $offer_post_id);
        $type_of_list = get_field('type_of_list', $offer_post_id);
        $included_services = get_field('included_services', $offer_post_id);
        $button = get_field('button', $offer_post_id);
        ?>

        <?php get_template_part('template-parts/card', 'price', [
          'card_content' => $card_content,
          'type_of_list' => $type_of_list,
          'included_services' => $included_services,
          'button' => $button
        ]); ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <div class="st-pricing-table__bottom">
    <?php echo $bottom_content; ?>
  </div>
</div>
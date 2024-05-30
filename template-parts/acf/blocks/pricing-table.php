<?php
// === ACF Data
$list_items = get_sub_field('list');
$bottom_content = get_sub_field('bottom_content');
?>

<div class="st-pricing-table">
  <?php if ($list_items) : ?>
    <div class="st-pricing-table__list">
      <?php foreach ($list_items as $item) : ?>
        <?php
        $service = $item['service'][0];
        setup_postdata($service);

        $title = get_field('content', $service->ID);
        $price = get_field('price', $service->ID);
        $included_services = get_field('included_services', $service->ID);
        $button = $item['button'];
        ?>
        <div class="st-pricing-table__list--item">
          <?php echo $title; ?>
          <p class="price">
            <?php echo __('À partir de', 'studio-val'); ?>
            <span><b><?php echo $price; ?>€</b><?php echo __('/mois', 'studio-val'); ?></span>
          </p>

          <ul>
            <?php foreach ($included_services as $service) : ?>
              <?php if ($service['is_included']) : ?>
                <li><?php echo $service['item']; ?></li>
              <?php else : ?>
                <li class="not-included"><?php echo $service['item']; ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>

          <?php get_template_part('template-parts/button', null, $button); ?>

        </div>
      <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
  <div class="st-pricing-table__bottom">
    <?php echo $bottom_content; ?>
  </div>
</div>
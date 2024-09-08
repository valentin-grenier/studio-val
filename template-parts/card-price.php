<?php
$card_content = $args['card_content'] ?? null;
$type_of_list = $args['type_of_list'] ?? null;
$included_services = $args['included_services'] ?? null;
$button = $args['button'] ?? null;

$checkmark_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/checkmark.svg');
$cross_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/cross.svg');

?>

<div class="st-card-price">
    <div class="st-card-price__title">
        <?php if ($card_content['title']): ?>
            <h3><?php echo $card_content['title']; ?></h3>
        <?php endif; ?>

        <?php if ($card_content['price']): ?>
            <span><?php echo $card_content['price']; ?></span>
        <?php endif; ?>

        <?php if ($card_content['subtitle']): ?>
            <p><?php echo $card_content['subtitle']; ?></p>
        <?php endif; ?>
    </div>

    <div class="st-card-price__list">
        <?php if (($included_services)): ?>
            <ul class="<?php echo $type_of_list === "simple" ? "list-simple" : "list-complex"; ?>">
                <?php foreach ($included_services as $service): ?>
                    <li class="<?php echo $service['is_included'] ? "included" : "not-included"; ?>">
                        <?php echo $service['is_included'] ? $checkmark_icon : $cross_icon; ?>
                        <span><?php echo $service['title']; ?></span>

                        <?php if ($service['subtitle']) : ?>
                            <p><?php echo $service['subtitle']; ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ($button) : ?>
            <?php get_template_part('template-parts/button', null, $button); ?>
        <?php endif; ?>
    </div>
</div>
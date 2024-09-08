<?php
$text = get_sub_field('text');
$offer = get_sub_field('offer');

if ($offer) {
    $offer_post_id = $offer->ID;
    $card_content = get_field('card_content', $offer_post_id);
    $included_services = get_field('included_services', $offer_post_id);
    $button = get_field('button', $offer_post_id);

    $checkmark_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/checkmark.svg');
    $cross_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/cross.svg');
}
?>

<div class="st-text-offer">
    <div class="st-text-offer__text">
        <p><?php echo $text; ?></p>
    </div>

    <?php if ($offer): ?>
        <div class="st-text-offer__offer">
            <div class="st-text-offer__offer--title">
                <h3><?php echo $card_content['title']; ?></h3>
                <span><?php echo $card_content['price']; ?></span>
                <p><?php echo $card_content['subtitle']; ?></p>
            </div>
            <div class="st-text-offer__offer--list">
                <?php if (!empty($included_services)): ?>
                    <ul>
                        <?php foreach ($included_services as $service): ?>
                            <li>
                                <?php echo $service['is_included'] ? $checkmark_icon : $cross_icon; ?>
                                <span><?php echo $service['title']; ?></span>
                                <p><?php echo $service['subtitle']; ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($button) : ?>
                    <?php get_template_part('template-parts/button', null, $button); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
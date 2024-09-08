<?php
$text = get_sub_field('text');
$offer = get_sub_field('offer');

if ($offer) {
    $offer_post_id = $offer->ID;
    $card_content = get_field('card_content', $offer_post_id);
    $type_of_list = get_field('type_of_list', $offer_post_id);
    $included_services = get_field('included_services', $offer_post_id);
    $button = get_field('button', $offer_post_id);
}
?>

<div class="st-text-offer">
    <div class="st-text-offer__text">
        <p><?php echo $text; ?></p>
    </div>

    <?php if ($offer): ?>
        <?php get_template_part('template-parts/card', 'price', [
            'card_content' => $card_content,
            'type_of_list' => $type_of_list,
            'included_services' => $included_services,
            'button' => $button
        ]); ?>
    <?php endif; ?>
</div>
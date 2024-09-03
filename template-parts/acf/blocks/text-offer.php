<?php
$text = get_sub_field('text');
$offer = get_sub_field('offer');
$services = $offer['services'];
$button = $offer['button'];
$checkmark_icon = file_get_contents(get_template_directory_uri() . '/assets/svg/checkmark.svg');
?>

<div class="st-text-offer">
    <div class="st-text-offer__text">
        <p><?php echo $text; ?></p>
    </div>

    <div class="st-text-offer__offer">
        <div class="st-text-offer__offer--title">
            <h3><strong><?php _e('Audit Technique WordPress', 'studio-val'); ?></strong> - 99€ HT</h3>
            <p><?php _e('Rapport d’analyse détaillé sur les performances, la sécurité, le responsive et le SEO de votre site WordPress.', 'studio-val'); ?></p>
        </div>
        <div class="st-text-offer__offer--list">
            <?php if ($offer): ?>
                <ul>
                    <?php foreach ($services as $service): ?>
                        <li>
                            <?php echo $checkmark_icon; ?>
                            <span><?php echo $service['title']; ?></span>
                            <p><?php echo $service['text']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($button) : ?>
                <?php get_template_part('template-parts/button', null, $button); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
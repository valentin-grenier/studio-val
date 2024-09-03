<?php
$text = get_sub_field('text');
$cards_list = get_sub_field('cards-list');
?>

<div class="st-text-rolling-cards">
    <div class="st-text-rolling-cards__text">
        <p><?php echo $text; ?></p>
    </div>

    <div class="st-text-rolling-cards__cards">
        <?php if ($cards_list) : ?>
            <?php foreach ($cards_list as $card) : ?>
                <div class="st-text-rolling-cards__card">
                    <div class="st-text-rolling-cards__card--title">
                        <p><?php echo $card['title']; ?></p>
                    </div>
                    <div class="st-text-rolling-cards__card--text">
                        <?php echo $card['text']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
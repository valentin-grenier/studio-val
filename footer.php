<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Studio Val
 */

// === ACF Footer Option Page Values
$logo = get_field('footer-logo', 'options');
$text = get_field('footer-text', 'options');
$button = get_field('footer-button', 'options');
$email = get_field('footer-email', 'options');

$menus = [
  'Mes réseaux sociaux' => 'footer-socials',
  'Légal'               => 'footer-legal',
  'Mes spécialisations' => 'footer-menu',
];

$bottom = get_field('footer-bottom', 'options');

$icon_arrow = file_get_contents(get_template_directory() . '/assets/svg/arrow.svg');

?>

<div class="st-back-to-top">
  <button><?php echo $icon_arrow; ?></button>
</div>

<footer class="st-footer">
  <div class="st-footer__container">
    <div class="st-footer__info">
      <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo $logo['alt']; ?>" />

      <div>
        <?php echo $text; ?>
      </div>

      <?php echo get_template_part('template-parts/button', null, $button) ?>

      <div>
        <?php echo $email; ?>
      </div>
    </div>
    <div class="st-footer__links">
      <?php foreach ($menus as $title => $menu) : ?>
        <div class="st-footer__menu">
          <span><?php echo $title ?></span>
          <?php wp_nav_menu(array('theme_location' => $menu)); ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="st-footer__bottom">
      <p><?php echo "© Studio Val " . date('Y') . ' - ' . preg_replace('/<p>(.*?)<\/p>/i', '$1', $bottom); ?></p>
    </div>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>
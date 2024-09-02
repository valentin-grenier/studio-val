<?php
$matches = array();

preg_match_all('/<h([2-3]).*?>(.*?)<\/h[2-3]>/si', get_the_content(), $matches, PREG_SET_ORDER);
?>

<div class="st-single__table-of-content">
  <span><?php _e('Sommaire', 'studio-val'); ?></span>
  <ol>
    <?php if (count($matches) > 0) : ?>
      <?php foreach ($matches as $match) : ?>
        <?php
        $heading_level = $match[1];
        $heading_text = strip_tags($match[2]);
        $heading_id = transliterator_transliterate('Any-Latin; Latin-ASCII', $heading_text); // Convert accents to non accents characters
        $heading_id = str_replace("'", '', $heading_id); // Remove apostrophes
        $heading_id = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $heading_id)); // Replace non-alphanumeric characters with hyphens
        $heading_id = rtrim($heading_id, '-'); // Remove trailing hyphens
        ?>
        <li class="<?php echo esc_attr('h' . $heading_level); ?>">
          <a href=" #<?php echo esc_attr($heading_id); ?>">
            <?php echo $heading_text; ?>
          </a>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ol>
</div>
<?php
$author_id = get_the_author_meta("ID");
$author_avatar = get_avatar($author_id, 128);
$author_name = $args ?? "";
$author_socials = array(
  "linkedin" => get_the_author_meta("linkedin", $author_id),
  "x" => get_the_author_meta("x", $author_id),
  "threads" => get_the_author_meta("threads", $author_id),
  "link" => get_the_author_meta("user_url", $author_id),
);
$author_company = get_the_author_meta("company", $author_id);
$author_position = get_the_author_meta("position", $author_id);
$author_bio = get_the_author_meta("description", $author_id);
$button = array(
  "text" => __("Contactez-moi", "studio-val"),
  "link" => array(
    "url" => __("/contact", "studio-val"),
    "target" => __("_blank", "studio-val"),
  ),
);
?>

<div class="st-single__signature">
  <?php if (!empty($author_avatar)) : ?>
    <div class="st-single__signature--image">

      <?php echo $author_avatar; ?>

    </div>
  <?php endif; ?>

  <div class="st-single__signature--author">
    <span class="name"><?php echo $author_name; ?></span>

    <span class="company"><?php echo $author_position . ' - ' . $author_company; ?></span>

    <p><?php echo $author_bio; ?></p>

    <div class="st-single__signature--socials">
      <?php if (count($author_socials)) : ?>
        <?php foreach ($author_socials as $social => $link) : ?>
          <a href="<?php echo esc_url($link); ?>" rel="follow">
            <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/svg/socials/logo-" . $social . ".svg"); ?>" alt="logo <?php echo esc_attr($social); ?>">
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
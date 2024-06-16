<?php
$category = get_the_category();
$date = get_the_date('j F Y');
$datetime = get_the_date('Y-m-d');
$title = get_the_title();
$author = get_the_author();
$excerpt = get_the_excerpt();
$content = get_the_content();
?>

<article class="st-single__content st-section boxed">
  <div class="st-single__content--container">
    <div class="st-single__content--header">
      <div class="st-single__content--tags">
        <span><?php echo $category[0]->name; ?></span>
        <time datetime="<?php echo esc_attr($datetime); ?>"><?php echo $date; ?></time>
      </div>
      <h1><?php echo $title ?></h1>
      <p><?php _e("Publié par <strong>$author</strong>, Développeur WordPress</p>", "studio-val"); ?></p>
    </div>

    <p><?php echo $excerpt; ?></p>

    <?php get_template_part('template-parts/single/single', 'table-of-content'); ?>

    <div class="st-single__content--text">
      <?php echo $content; ?>
    </div>

    <?php get_template_part('template-parts/single/single', 'sidebar'); ?>

    <?php get_template_part('template-parts/single/single', 'signature', $author); ?>
  </div>
</article>
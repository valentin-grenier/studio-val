<?php
$current_url = urlencode(get_permalink());
$title = urlencode(get_the_title());

$socials = array(
  'facebook' => array(
    'link' => 'https://www.facebook.com/sharer/sharer.php?u=' . $current_url,
    'icon' => 'logo-facebook',
    'target' =>  '_blank',
  ),
  'linkedin' => array(
    'link' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $current_url,
    'icon' => 'logo-linkedin',
    'target' =>  '_blank',
  ),
  'x' => array(
    'link' => 'https://x.com/intent/tweet?url=' . $current_url . '&text=' . $title,
    'icon' => 'logo-x',
    'target' =>  '_blank',
  ),
  'whatsapp' => array(
    'link' => 'https://api.whatsapp.com/send?text=' . $title . ' - ' . $current_url,
    'icon' => 'logo-whatsapp',
    'target' =>  '_blank',
  ),
  'link' => array(
    'link' => '', // Added an empty link to match the array structure
    'icon' => 'logo-link',
  ),
);
?>

<aside class="st-single__sidebar">
  <span class="st-single__sidebar--title">
    <?php _e("Partagez cet article", "studio-val"); ?>
  </span>

  <ul>
    <?php foreach ($socials as $social => $details) : ?>
      <li>
        <?php if ($social !== "link") : ?>
          <a href="<?php echo isset($details['link']) ? esc_url($details['link']) : ''; ?>" target="<?php echo isset($details['target']) ? esc_attr($details['target']) : ''; ?>" rel="nofollow noopener noreferrer">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/socials/' . $details['icon'] . '.svg'); ?>" alt="logo <?php echo esc_attr($social); ?>">
          </a>
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/socials/' . $details['icon'] . '.svg'); ?>" alt="logo <?php echo esc_attr($social); ?>">
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>
<?php
$current_url = urlencode(get_permalink());
$title = urlencode(get_the_title());

$socials = array(
  'facebook' => array(
    'link' => 'https://www.facebook.com/sharer/sharer.php?u=' . $current_url,
    'icon' => 'logo-facebook'
  ),
  'linkedin' => array(
    'link' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $current_url,
    'icon' => 'logo-linkedin'
  ),
  'x' => array(
    'link' => 'https://x.com/intent/tweet?url=' . $current_url . '&text=' . $title,
    'icon' => 'logo-x'
  ),
  'whatsapp' => array(
    'link' => 'https://api.whatsapp.com/send?text=' . $title . ' - ' . $current_url,
    'icon' => 'logo-whatsapp'
  ),
  'link' => array(
    'link' => '', // Added an empty link to match the array structure
    'icon' => 'logo-link'
  ),
);
?>

<aside class="st-single__sidebar">
  <ul>
    <?php foreach ($socials as $social => $details) : ?>
      <li>
        <a href="<?php echo isset($details['link']) ? esc_url($details['link']) : ''; ?>" target="_blank" rel="nofollow noopener noreferrer">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/socials/' . $details['icon'] . '.svg'); ?>" alt="logo <?php echo esc_attr($social); ?>">
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>
<?php
$layouts = [
  'ptg-jumbotron'   => 'banner',
  'ptg-about'       => 'about',
  'ptg-services'    => 'services-home',
  'ptg-incut'       => 'incut-home',
  'ptg-text'        => 'text',
  'ptg-spoiler'     => 'spoiler',
  'ptg-articles'    => 'articles',  
  'ptg-projects'    => 'projects',
  // 'ptg-contacts'    => 'contacts',
  // 'ptg-video'       => 'video-gallery',
  // 'ptg-feedback'    => 'feedback',
  // 'ptg-partners'    => 'partners',
  // 'ptg-clients'     => 'clients',
  // 'ptg-gallery'     => 'photo-gallery',
  // 'ptg-alert'       => 'alert',  
  // 'ptg-discover'    => 'discover',
];

$layout = get_row_layout();

if (isset($layouts[$layout])) {
  get_template_part('templates/block', $layouts[$layout]);
}
?>

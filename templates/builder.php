<?php
if ( get_row_layout() == 'ptg-jumbotron' ) : get_template_part( 'templates/block', 'banner' );

elseif ( get_row_layout() == 'ptg-incut' ) : get_template_part( 'templates/block', 'incut' );

elseif ( get_row_layout() == 'ptg-text' ) : get_template_part( 'templates/block', 'text' );

elseif ( get_row_layout() == 'ptg-spoiler' ) : get_template_part( 'templates/block', 'spoiler' );

elseif ( get_row_layout() == 'ptg-articles' ) : get_template_part( 'templates/block', 'articles' );

elseif ( get_row_layout() == 'ptg-services' ) : get_template_part( 'templates/block', 'services' );

elseif ( get_row_layout() == 'ptg-projects' ) : get_template_part( 'templates/block', 'projects' );

elseif ( get_row_layout() == 'ptg-contacts' ) : get_template_part( 'templates/block', 'contacts' );

elseif ( get_row_layout() == 'ptg-video' ) : get_template_part( 'templates/block', 'video-gallery' );

elseif ( get_row_layout() == 'ptg-feedback' ) : get_template_part( 'templates/block', 'feedback' );

elseif ( get_row_layout() == 'ptg-partners' ) : get_template_part( 'templates/block', 'partners' );

elseif ( get_row_layout() == 'ptg-clients' ) : get_template_part( 'templates/block', 'clients' );

elseif ( get_row_layout() == 'ptg-gallery' ) : get_template_part( 'templates/block', 'photo-gallery' );

elseif ( get_row_layout() == 'ptg-alert' ) : get_template_part( 'templates/block', 'alert' );

elseif ( get_row_layout() == 'ptg-about' ) : get_template_part( 'templates/block', 'about' );

elseif ( get_row_layout() == 'ptg-discover' ) : get_template_part( 'templates/block', 'discover' );

endif;

?>
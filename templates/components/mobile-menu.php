<?php


?>

<i class="icon-mobile"
   id="menuOpener"></i>

<div id="mobileMenu"
	 class="mobile-menu container"
	 data-active="false">

	<header class="mobile-menu__header">
		<i class="icon-close btn icon"
		   id="menuCloser"></i>

		<a class="btn"
		   variant="primary"
		   size="medium">
			<i class="icon-form"></i>
			<?php _e( 'ارسال درخواست', 'cyn-dm' ) ?>
		</a>
	</header>

	<?php
	wp_nav_menu( [ 
		'theme_location' => 'header',
		'container_class' => 'mobile-menu__nav'
	] )

		?>

</div>
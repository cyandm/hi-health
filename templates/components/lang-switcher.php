<?php
$langs = pll_the_languages( [ 
	'raw' => true
] );

$current_lang = pll_current_language( \OBJECT );



?>


<div class="lang-switcher">
	<div class="lang-switcher__current">
		<?= $current_lang->slug ?>
		<?= $current_lang->custom_flag ?>


	</div>
	<div class="lang-switcher__list">
		<?php
		foreach ( $langs as $lang ) {

			if ( $lang['current_lang'] )
				continue;

			printf( '<a href="%s" class="lang-switcher__item">%s <img src="%s" /></a>',
				$lang['url'],
				$lang['slug'],
				$lang['flag']
			);
		}
		?>
	</div>

</div>